---
title: 'Formulário de Contato'
menu: Contato
aura:
    pagetype: website
organisation: 'Verein beeidigter Dolmetscher und Übersetzer Sachsen e.V.'
strasse: 'Possendorfer Str. 11'
plz: '01217'
ort: Dresden
telefon: '+49 (351) 41 88 44 04'
telefax: '+49 (351) 85 07 47 18'
email: info@beeidigte-dolmetscher.de
form:
    name: Kontaktformular
    fields:
        name:
            label: 'Ihr Name'
            placeholder: 'Geben Sie hier Ihren Namen ein.'
            autofocus: 'on'
            autocomplete: 'on'
            type: text
            validate:
                required: true
                pattern: '^((?!https?:\/\/)(?:\R|.))*$'
            validate.message: 'Bitte füllen Sie dieses Feld aus.'
            classes: form-control
        email:
            label: E-Mail-Adresse
            placeholder: 'Geben Sie hier Ihre E-Mail-Adresse ein.'
            type: email
            autofocus: true
            validate:
                rule: email
                required: true
            validate.message: 'Bitte füllen Sie dieses Feld aus.'
            classes: form-control
        message:
            label: Nachricht
            size: long
            placeholder: 'Geben Sie hier Ihre Nachricht ein.'
            type: textarea
            rows: 8
            autofocus: true
            validate:
                required: true
                pattern: '^((?!https?:\/\/)(?:\R|.))*$'
            validate.message: 'Bitte füllen Sie dieses Feld aus.'
            classes: form-control
        Dateianhang:
            type: file
            multiple: false
            destination: '@self'
            autofocus: false
            filesize: 5
            validate:
                required: false
            accept:
                - 'image/*'
                - application/pdf
        Telefon:
            type: tel
            label: 'Telefon für Rückruf'
            placeholder: 'Hier können Sie uns Ihre Telefonnummer mitteilen.'
            validate:
                required: false
            classes: form-control
        einverstanden:
            type: checkbox
            label: 'Ich habe die Datenschutzerklärung zur Kenntnis genommen und bin mit der Speicherung und Verarbeitung meiner über das Kontaktformular gesendeten Daten einverstanden.'
            validate:
                required: true
        honeypot:
            type: honeypot
        spacer:
            type: spacer
            underline: true
        Info:
            type: display
            size: small
            label: Info
            markdown: true
            content: 'Mit einem Stern* gekennzeichnete Felder sind **Pflichtfelder** und können nicht leer gelassen werden.'
        spacer2:
            type: spacer
            underline: true
        'Alles ausgefüllt?':
            type: display
            size: small
            label: null
            text: ''
            markdown: false
            content: 'Dann senden Sie Ihre Nachricht bitte ab. Sie erhalten schnellstmöglich Antwort.'
    buttons:
        submit:
            type: submit
            value: Absenden
            classes: 'btn btn-primary'
        reset:
            type: reset
            value: Abbrechen
            classes: 'btn btn-outline-secondary'
    process:
        email:
            from: '{{ config.plugins.email.from }}'
            to:
                - team+koordinatoren.15adc6d7f4ad9c22aeece219a43b6c03@beeidigte-dolmetscher.de
                - bestellung@beeidigte-dolmetscher.de
                - info@beeidigte-dolmetscher.de
            subject: 'Anfrage über Kontaktformular'
            body: '{% include ''forms/data.html.twig'' %}'
            attachments:
                - Dateianhang
        save:
            fileprefix: feedback-
            dateformat: Ymd-His-u
            extension: txt
            body: '{% include ''forms/data.txt.twig'' %}'
        message: 'Vielen Dank für Ihre Nachricht.'
        display: thankyou
---

Für Aufträge und Bestellungen nutzen Sie bitte die E-Mail-Adresse **[bestellung@beeidigte-dolmetscher.de](mailto:bestellung@beeidigte-dolmetscher.de)** oder das nachfolgende Kontaktformular (max. ein Dateianhang bis 5MB, nur vom Typ `image` oder `pdf`, keine Links!).
