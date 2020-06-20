---
title: 'Контактная форма'
menu: Контакт
organisation: 'Verein beeidigter Dolmetscher und Übersetzer Sachsen e.V.'
strasse: 'Possendorfer Str. 11'
plz: '01217'
ort: Dresden
telefon: '+49 (351) 41 88 44 04'
telefax: '+49 (351) 85 07 47 18'
email: info@beeidigte-dolmetscher.de
form:
    name: 'Контактная форма'
    fields:
        name:
            label: 'Ваше имя'
            placeholder: 'Сообщите нам, как к Вам обращаться.'
            autofocus: 'on'
            autocomplete: 'on'
            type: text
            validate:
                required: true
                pattern: '^((?!https?:\/\/)(?:\R|.))*$'
            validate.message: 'Пожалуйста, заполните это поле.'
            classes: form-control
        email:
            label: 'Адрес электронной почты'
            placeholder: 'Оставьте тут Ваш адрес электронной почты.'
            type: email
            autofocus: true
            validate:
                rule: email
                required: true
            validate.message: 'Пожалуйста, заполните это поле.'
            classes: form-control
        message:
            label: Сообщение
            size: long
            placeholder: 'Напишите сообщение для нас в этом поле.'
            type: textarea
            rows: 8
            autofocus: true
            validate:
                required: true
                pattern: '^((?!https?:\/\/)(?:\R|.))*$'
            validate.message: 'Пожалуйста, заполните это поле.'
            classes: form-control
        Dateianhang:
            type: file
            label: 'Прикрепить файл'
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
            label: 'Номер телефона'
            placeholder: 'Можете сообщить нам номер телефона для обратной связи.'
            validate:
                required: false
            classes: form-control
        einverstanden:
            type: checkbox
            label: 'Я ознакомился/-ась с Политикой конфиденциальности и согласен/согласна с тем, что предоставленная мной через контактную форму информация сохраняется и обрабатывается.'
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
            label: Информация
            markdown: true
            content: 'Поля, обозначенные звездочкой*, **обязательные к заполнению** и не могут оставаться пустыми.'
        spacer2:
            type: spacer
            underline: true
        'Alles ausgefüllt?':
            type: display
            size: small
            label: 'Все заполнили?'
            markdown: false
            content: 'Тогда отсылайте запрос. С Вами вскоре свяжутся.'
    buttons:
        submit:
            type: submit
            value: Отослать
            classes: 'btn btn-primary'
        reset:
            type: reset
            value: Сброс
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
        message: 'Благодарим за Ваше сообщение.'
        display: thankyou
---

Если Вы хотите направить нам запрос или заказ, пожалуйста, обращайтесь по электронной почте на адрес **[bestellung@beeidigte-dolmetscher.de](mailto:bestellung@beeidigte-dolmetscher.de)** или используйте контактную форму ниже (прикрепить можно не более одного файла, размером не больше чем 5мб, только типов `image` или `pdf`, ссылки на интернет-сайты запрещены).