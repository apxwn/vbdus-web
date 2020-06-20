---
title: Contact form
menu: Contact
organisation: 'Verein beeidigter Dolmetscher und Übersetzer Sachsen e.V.'
strasse: 'Possendorfer Str. 11'
plz: '01217'
ort: Dresden
telefon: '+49 (351) 41 88 44 04'
telefax: '+49 (351) 85 07 47 18'
email: info@beeidigte-dolmetscher.de
form:
    name: 'Contact form'
    fields:
        name:
            label: 'Your name'
            placeholder: 'Please enter your name.'
            autofocus: 'on'
            autocomplete: 'on'
            type: text
            validate:
                required: true
                pattern: '^((?!https?:\/\/)(?:\R|.))*$'
            validate.message: 'Please fill in this field.'
            classes: form-control
        email:
            label: Email address
            placeholder: 'Please enter your email address.'
            type: email
            autofocus: true
            validate:
                rule: email
                required: true
            validate.message: 'Please fill in this field.'
            classes: form-control
        message:
            label: Message
            size: long
            placeholder: 'Please enter your message here.'
            type: textarea
            rows: 8
            autofocus: true
            validate:
                required: true
                pattern: '^((?!https?:\/\/)(?:\R|.))*$'
            validate.message: 'Please fill in this field.'
            classes: form-control
        Dateianhang:
            type: file
            label: 'File attachment'
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
            label: 'Telephone number'
            placeholder: 'You can provide your telephone number.'
            validate:
                required: false
            classes: form-control
        einverstanden:
            type: checkbox
            label: 'I have taken note of the Data Privacy statement and I agree with the data provided by me here being stored and processed.'
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
            content: 'Fields marked with an asterisk* are **mandatory fields** and cannot stay empty.'
        spacer2:
            type: spacer
            underline: true
        'Alles ausgefüllt?':
            type: display
            size: small
            label: 'Did you fill in everything?'
            text: ''
            markdown: false
            content: 'Then please submit your message. You will receive feedback shortly.'
    buttons:
        submit:
            type: submit
            value: Submit
            classes: 'btn btn-primary'
        reset:
            type: reset
            value: Reset
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
        message: 'Thank you for your submission.'
        display: thankyou
---

For assignments and orders, please, send an email to **[bestellung@beeidigte-dolmetscher.de](mailto:bestellung@beeidigte-dolmetscher.de)** or use the contact form (you may upload one file up to 5MB in size, only of type `image` or `pdf`, don't include links anywhere!).