<div>
    <p>Estimado(a) {{ $personaName }},</p>
    <p>Para poder recibir documentos de facturación electrónica de la compañía {{ $company }}, debe dar click en la siguiente invitación:</p>
    <p>
        <a href="{{ config('telegram.bots.DorsiSoftBot.bot_url') }}">{{ config('telegram.default') }}</a>
    </p>
</div>
