<?php

return [

    'auth'                  => 'Autentisering',
    'profile'               => 'Profil',
    'logout'                => 'Logg ut',
    'login'                 => 'Logg inn',
    'forgot'                => 'Glemt',
    'login_to'              => 'Logg inn for å starte din økt',
    'remember_me'           => 'Husk meg',
    'forgot_password'       => 'Jeg har glemt mitt passord',
    'reset_password'        => 'Tilbakestill passord',
    'change_password'       => 'Endre passord',
    'enter_email'           => 'Skriv inn din e-postadresse.',
    'current_email'         => 'Gjeldende e-post',
    'reset'                 => 'Tilbakestill',
    'never'                 => 'aldri',
    'landing_page'          => 'Landingsside',
    'personal_information'  => 'Personlig informasjon',
    'register_user'         => 'Registrer bruker',
    'register'              => 'Registrer',

    'form_description' => [
        'personal'          => 'Invitasjonslenken blir sendt til den nye brukeren, så pass på at e-postadressen er riktig. De vil kunne angi passordet sitt.',
        'assign'            => 'Brukeren vil ha tilgang til de valgte bedriftene. Du kan begrense tillatelser fra <a href=":url" class="border-b border-black">rolle</a> -siden.',
        'preferences'       => 'Velg standardspråket for brukeren. Du kan også velge landingssiden etter at brukeren har logget inn.',
    ],

    'password' => [
        'pass'              => 'Passord',
        'pass_confirm'      => 'Passordbekreftelse',
        'current'           => 'Gjeldende passord',
        'current_confirm'   => 'Bekreftelse på gjeldende passord',
        'new'               => 'Nytt passord',
        'new_confirm'       => 'Passordbekreftelse',
    ],

    'error' => [
        'self_delete'       => 'Feil: Du kan ikke slette deg selv.',
        'self_disable'      => 'Feil: Du kan ikke deaktivere deg selv!',
        'no_company'        => 'Feil: Ingen foretak knyttet til din konto. Vennligst kontakt systemadministrator.',
    ],

    'login_redirect'        => 'Verifisering fullført! Du blir omdirigert...',
    'failed'                => 'Disse opplysningene samsvarer ikke med våre oppføringer.',
    'throttle'              => 'For mange innloggingsforsøk. Forsøk igjen om :seconds sekunder.',
    'disabled'              => 'Denne kontoen er deaktivert. Kontakt systemadministrator.',

    'notification' => [
        'message_1'         => 'Du mottar denne e-posten fordi vi mottok en forespørsel om pasordnullstilling for din konto.',
        'message_2'         => 'Hvis du ikke ba om å nullstille passord trenger du ikke foreta deg noe mer.',
        'button'            => 'Nullstill passord',
    ],

    'invitation' => [
        'message_1'         => 'Du mottar denne e-posten fordi du er invitert til å bli med i Akaunting.',
        'message_2'         => 'Hvis du ikke ønsker å bli med, er det ikke nødvendig med ytterligere tiltak.',
        'button'            => 'Kom i gang',
    ],

    'information' => [
        'invoice'           => 'Opprett fakturaer enkelt',
        'reports'           => 'Få detaljerte rapporter',
        'expense'           => 'Spor alle utgifter',
        'customize'         => 'Tilpass din Akaunting',
    ],

    'roles' => [
        'admin' => [
            'name'          => 'Admin',
            'description'   => 'De får full tilgang til Akaunting inkludert kunder, fakturaer, rapporter, innstillinger og apper.',
        ],
        'manager' => [
            'name'          => 'Behandler',
            'description'   => 'De får full tilgang til Akaunting, men kan ikke administrere brukere og apper.',
        ],
        'customer' => [
            'name'          => 'Kunde',
            'description'   => 'De kan få tilgang til klientportalen og betale fakturaer på nettet gjennom de betalingsmetodene du har konfigurert.',
        ],
        'accountant' => [
            'name'          => 'Regnskapsfører',
            'description'   => 'De kan få tilgang til fakturaer, transaksjoner, rapporter og opprette journaloppføringer.',
        ],
        'employee' => [
            'name'          => 'Ansatt',
            'description'   => 'De kan legge til utgiftskrav og sportid for tilordnede prosjekter, men kan bare se egen informasjon.',
        ],
    ],

];
