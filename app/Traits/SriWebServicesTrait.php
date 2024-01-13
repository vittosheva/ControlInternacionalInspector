<?php

namespace App\Traits;

use App\Enums\IdentificationTypeEnum;
use App\WebServices\Sri\SriCedulaWs;
use App\WebServices\Sri\SriEstablishmentInfoWs;
use App\WebServices\Sri\SriSubjectByIdentificationTypeWs;
use App\WebServices\Sri\SriSubjectInfoWs;
use App\WebServices\Sri\SriTokenAuthorizationWs;
use App\WebServices\Sri\SriTokenWs;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Illuminate\Http\Client\PendingRequest;

trait SriWebServicesTrait
{
    protected static function sriWebserviceCedula($state, $label, Set $set, Get $get): ?Set
    {
        $sriAPiIdentification = (new SriCedulaWs($state))->run();

        if ($sriAPiIdentification->failed()) {
            Notification::make()
                ->title(__('Something went wrong'))
                ->danger()
                ->color(Color::Red)
                ->body('Error inesperado del SRI')
                ->send();

            return null;
        }

        $persona = $sriAPiIdentification->object();

        if (empty($persona) || empty($persona->nombreCompleto)) {
            Notification::make()
                ->warning()
                ->color(Color::Amber)
                ->body('No se pudo obtener información de '.$state.' en el SRI')
                ->send();

            return null;
        }

        // Establish data
        $set('identification_type', IdentificationTypeEnum::CEDULA->value);
        $set('persona_type', $persona->tipoPersona ?? null);
        $set($label, $persona->nombreCompleto);

        if (! blank($get('owner'))) {
            $set('owner', $persona->nombreCompleto);
        } else {
            $set('name', $persona->nombreCompleto);
        }

        $set('business_name', $persona->nombreCompleto);
        $set('trade_name', $persona->nombreCompleto);

        $set('contributor_activity', null);
        $set('address', null);

        Notification::make()
            ->info()
            ->color(Color::Blue)
            ->body('Se encontró información de la persona en el SRI')
            ->send();

        return $set;
    }

    protected static function sriWebserviceRuc($state, $label, Set $set, Get $get): ?Set
    {
        // --------------------------------------------------------------- //
        // 1.- CREATE CLIENT
        // --------------------------------------------------------------- //
        $client = (new PendingRequest)->buildClient();

        // --------------------------------------------------------------- //
        // 2.- TOKEN GENERATION
        // --------------------------------------------------------------- //
        $sriTokenWs = (new SriTokenWs($client))->run();

        if ($sriTokenWs->failed()) {
            Notification::make()
                ->warning()
                ->color(Color::Amber)
                ->body('No se pudo crear Catpcha SRI!')
                ->send();
        }

        $token = $sriTokenWs->object();

        if (empty($token->values[0])) {
            Notification::make()
                ->title(__('Something went wrong'))
                ->danger()
                ->color(Color::Red)
                ->body('No existe Token para continuar')
                ->send();

            return null;
        }

        // --------------------------------------------------------------- //
        // 3.- TOKEN AUTHORIZATION
        // --------------------------------------------------------------- //
        $sriTokenAuthorizationWs = (new SriTokenAuthorizationWs($client, $token->values[0]))->run();

        if ($sriTokenAuthorizationWs->failed()) {
            Notification::make()
                ->title(__('Something went wrong'))
                ->danger()
                ->color(Color::Red)
                ->body('Error de validación token en SRI')
                ->send();

            return null;
        }

        $authorization = $sriTokenAuthorizationWs->object();

        // --------------------------------------------------------------- //
        // 4.- GET DATA FROM SRI
        // --------------------------------------------------------------- //
        $sriAPiIdentification = (new SriSubjectInfoWs($authorization->mensaje, $state))->run();

        if ($sriAPiIdentification->failed() || empty($identificationData = $sriAPiIdentification->object())) {
            Notification::make()
                ->title(__('Something went wrong'))
                ->danger()
                ->color(Color::Red)
                ->body('No se pudo obtener la información desde el SRI')
                ->send();

            return null;
        }

        $identificationData = $identificationData[0];

        // --------------------------------------------------------------- //
        // 5.- GET CATASTRO FOR PERSONA TYPE
        // --------------------------------------------------------------- //
        $sriGetPersonaByTypeWs = (new SriSubjectByIdentificationTypeWs($client, $state))->run();

        if ($sriGetPersonaByTypeWs->successful()) {
            $persona = $sriGetPersonaByTypeWs->object();
        }

        // --------------------------------------------------------------- //
        // 6.- GET ESTABLISHMENTS
        // --------------------------------------------------------------- //
        $establishmentsWs = (new SriEstablishmentInfoWs($authorization->mensaje, $state))->run();

        $establishments = $establishmentsWs
            ->collect()
            ->filter(fn ($value) => $value['tipoEstablecimiento'] === 'MAT' && $value['estado'] === 'ABIERTO')
            ->first();

        if (empty($establishments)) {
            Notification::make()
                ->warning()
                ->color(Color::Amber)
                ->body('No se pudo obtener información de establecimientos en el SRI')
                ->send();
        }

        // Establish data
        $set('identification_type', IdentificationTypeEnum::RUC->value);
        $set('persona_type', $persona->tipoPersona ?? null);
        $set($label, $identificationData->razonSocial);

        if (! blank($get('owner'))) {
            $set('owner', $identificationData->razonSocial);
        } else {
            $set('name', $identificationData->razonSocial);
        }

        $set('business_name', $identificationData->razonSocial);
        $set('trade_name', $identificationData->razonSocial);

        $set('contributor_activity', $identificationData->actividadEconomicaPrincipal ?? null);
        $set('address', $establishments['direccionCompleta'] ?? null);
        //$set('address', Str::of($establishments['direccionCompleta'])->explode(' / ')->last() ?? null);

        Notification::make()
            ->info()
            ->color(Color::Blue)
            ->body('Se encontró información de la empresa/persona en el SRI')
            ->send();

        return $set;
    }
}
