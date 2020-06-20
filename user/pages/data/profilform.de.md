---
cache_enable: false
visible: false
title: 'Abfrage / Update Profildaten'
form:
    name: 'Abfrage Profildaten'
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
            outerclasses: form-group
            classes: form-control
        generell:
            type: radio
            label: 'Ich wünsche, dass der Verein Beeidigter Dolmetscher und Übersetzer Sachsen e.V. meine hier angegebenen, personenbezogenen Daten gemäß der DSGVO speichert und verarbeitet sowie auf der Webseite www.beeidigte-dolmetscher.de veröffentlicht. Ich möchte, dass mein Profil auf der Webseite des VBDÜS erscheint. Betroffenenrechte kann ich beim Datenschutzverantwortlichen (dsgvo@beeidigte-dolmetscher.de) geltend machen. Weitere Informationen zum Thema Datenschutz finden sich unter https://beeidigte-dolmetscher.de/de/impressum.'
            default: nein
            options:
                ja: Ja
                nein: Nein
            validate:
                required: true
        allesok:
            type: radio
            label: 'Mein Profil ist so, wie es momentan online ist, in Ordnung.'
            default: nein
            options:
                ja: Ja
                nein: Nein
        spacer:
            type: spacer
            underline: true
        gender:
            type: radio
            label: 'Die folgende Angabe spielt nur für die Auswahl des Platzhalter-Profilbilds und den Genus der Berufsbezeichnung eine Rolle. Ich bin...'
            default: mann
            options:
                mann: männlich
                frau: weiblich
        titel:
            type: text
            label: 'Hier können Sie Ihren Titel (Dr., Prof. Dr., Dipl.-Dolm. usw. usf.) angeben, wenn Sie möchten.'
            classes: form-control
            outerclasses: form-group
        sprachen:
            type: text
            label: 'Bitte geben Sie die Sprache(n) an, für die Sie übersetzen/dolmetschen. Mehrere Sprachen bitte mit Komma getrennt hintereinander schreiben.'
            classes: form-control
            outerclasses: form-group
        info:
            type: display
            label: Beeidigung
            content: 'Wenn Sie mehrere Fremdsprachen bedienen, für die Sie unterschiedlich beeidigt sind, wählen Sie bitte die für Sie bestmögliche Option. Eine differenzierte Betrachtung pro Sprache ist nicht möglich.'
        beeidigung:
            type: checkboxes
            label: 'Ich bin beeidigte(r)...'
            default:
                option1: true
                option2: false
            options:
                option1: Übersetzer(in)
                option2: Dolmetscher(in)
            outerclasses: checkbox
            classes: form-control
        adresse:
            type: textarea
            label: 'Ihre Adresse / Anschrift.'
            rows: 6
            outerclasses: form-group
            classes: form-control
        festnetz:
            type: tel
            label: 'Ihre Festnetznummer.'
            outerclasses: form-group
            classes: form-control
        mobiltelefon:
            type: tel
            label: 'Ihre Mobilfunknummer.'
            outerclasses: form-group
            classes: form-control
        fax:
            type: tel
            label: 'Ihre Faxnummer.'
            outerclasses: form-group
            classes: form-control
        email:
            label: 'Ihre E-Mail-Adresse.'
            type: email
            autofocus: true
            validate:
                rule: email
            outerclasses: form-group
            classes: form-control
        webseite:
            label: 'Die URL Ihrer Webseite.'
            type: url
            autofocus: true
            outerclasses: form-group
            classes: form-control
        schwerpunkt1:
            type: text
            label: 'Bitte geben Sie in kurzen Stichpunkten Ihre Schwerpunkte / Fachgebiete an. (Zeile 1)'
            outerclasses: form-group
            classes: form-control
        schwerpunkt2:
            type: text
            label: 'Bitte geben Sie in kurzen Stichpunkten Ihre Schwerpunkte / Fachgebiete an. (Zeile 2)'
            outerclasses: form-group
            classes: form-control
        schwerpunkt3:
            type: text
            label: 'Bitte geben Sie in kurzen Stichpunkten Ihre Schwerpunkte / Fachgebiete an. (Zeile 3)'
            outerclasses: form-group
            classes: form-control
        bild:
            type: file
            label: 'Sie können uns ein Bild bzw. Logo schicken, das in Ihr Profil eingebunden wird. Nur typische Bilddateien, max. 5MB Größe.'
            multiple: false
            destination: '@self'
            autofocus: false
            filesize: 5
            validate:
                required: false
            accept:
                - 'image/*'
            outerclasses: form-group
            classes: form-control
        honeypot:
            type: honeypot
        kommentar:
            type: textarea
            label: 'Möchten Sie noch etwas mitteilen? Hier können Sie z.B. um die Löschung einzelner derzeit in Ihrem Profil vorhandener Angaben bitten.'
            rows: 6
            outerclasses: form-group
            classes: form-control
        spacer2:
            type: spacer
            underline: true
        fertig:
            type: display
            size: small
            label: 'Alles ausgefüllt?'
            text: ' '
            markdown: true
            content: 'Dann klicken Sie unten auf Absenden. Vielen Dank für die investierte Zeit. **Sie erklären sich durch das Absenden damit einverstanden, dass Ihre Angaben gespeichert, verarbeitet und auf der Webseite des VBDÜS e.V. veröffentlicht werden.**'
        spacer3:
            type: spacer
            underline: false
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
                - r.bannack@beeidigte-dolmetscher.de
            subject: 'VBDÜS Profilupdate'
            body: '{% include ''forms/data.html.twig'' %}'
            attachments:
                - Dateianhang
        save:
            fileprefix: profilupdate-
            dateformat: Ymd-His-u
            extension: txt
            body: '{% include ''forms/data.txt.twig'' %}'
        message: 'Vielen Dank nochmal.'
        display: thankyou2
---

### Guten Tag!

Dieses Formular dient der Aktualisierung der Profildaten von Mitgliedern des VBDÜS e.V. zur Darstellung auf der Webseite des Vereins. Bitte schauen Sie sich zunächst unter dem Menüpunkt [Mitglieder](/mitglieder) Ihr Profil an (wenn vorhanden) und beantworten dann die folgenden Fragen. Pflichtangaben sind nur Ihr Name und die Auswahl, ob Ihr Profil auf der Webseite erscheinen soll oder nicht. **Im Übrigen genügt es, wenn Sie nur die Angaben machen, die zu korrigieren sind.** Sprachen, Adressdaten (Ort, PLZ) sowie Fachgebiete / Spezialisierungen werden sich auf der Webseite über eine **Suchfunktion** lokalisieren lassen (dz. noch nicht implementiert).
