<?php

namespace App\Enums;

use App\Enums\Traits\EnumToArrayTrait;
use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ProformaStatusEnum: string implements HasColor, HasLabel
{
    use EnumToArrayTrait;

    case DRAFT = 'DRAFT';
    case SENT = 'SENT';
    case EXPIRED = 'EXPIRED';
    case DECLINED = 'DECLINED';
    case ACCEPTED = 'ACCEPTED';
    case DELETED = 'DELETED';

    public function getLabel(): ?string
    {
        return $this->translate();
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::DRAFT => Color::Gray,
            self::SENT => Color::Sky,
            self::EXPIRED => Color::Yellow,
            self::DECLINED => Color::Red,
            self::ACCEPTED => Color::Green,
            self::DELETED => Color::Rose,
        };
    }

    public function translate(): string
    {
        return match ($this) {
            self::DRAFT => __('Draft'),
            self::SENT => __('Sent'),
            self::EXPIRED => __('Expired'),
            self::DECLINED => __('Declined'),
            self::ACCEPTED => __('Accepted'),
            self::DELETED => __('Deleted'),
        };
    }

    public function explanation(): string
    {
        return match ($this) {
            self::DRAFT => 'Documento en borrador',
            self::SENT => 'Documento enviado',
            self::EXPIRED => 'Documento expirado',
            self::DECLINED => 'Documento rechazado',
            self::ACCEPTED => 'Documento aceptado',
            self::DELETED => 'Documento eliminado',
        };
    }
}
