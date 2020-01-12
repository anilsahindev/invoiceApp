<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>customerinvoice</title>
    <style>
        .container {
            box-shadow: 1px 1px 20px 1px #a9a9a9;
            background: #fff;
            padding: 20px;
        }

        body {
            background: #e0e0e000;
        }

        .download-button {
            width: 150px;
            height: 150px;
            background: none;
            border-radius: 50%;
            position: fixed;
            background: #fff;
            font-size: 24px;
            color: #ff6767;
            outline: none;
            top: 50%;
            box-shadow: 1px 1px 20px 1px #989898;
        }

        @media print {
            @page { margin: 0; }
            .download-button {
                display: none;
            }
            .container {
                box-shadow: none;
            }
        }

    </style>
</head>
<body>
<div id="section" class="section" style="width:800px;margin:0 auto;font-family: sans-serif;">
    <div class="container">
        <div class="row">
            <div class="pdf col-md-12" style="">
                <table style="width:100%; text-transform: capitalize;">
                    <tr>
                        <td style="width:80%;padding:0px 10px;">

                        </td>
                        <td style="width:20%; padding:0px 10px;">
                            <img src="http://anlshn.com/testforpdf/logo.jpg" alt="#" style="width:200px;height:auto;">
                        </td>


                    </tr>
                    <tr>
                        <td style="width:80%;padding:0px 10px; ">
                            Herr
                        </td>
                        <td style="width:20%">

                        </td>
                    </tr>
                    <tr>
                        <td style="width:80%;padding:0px 10px; ">
                            {{$entry->first_name}}  {{$entry->last_name}}
                        </td>
                        <td style="width:20%; padding:0px 10px;">

                        </td>
                    </tr>
                    <tr>
                        <td style="width:80%;padding:0px 10px; ">
                            {{$entry->address}}
                        </td>
                        <td style="width:20%;  vertical-align: text-top;">
                            Berater: Anıl ŞAHİN
                            <br>
                            <span style="font-weight:bold;">Kundennummer: {{$entry->id}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:80%;padding:0px 10px; ">

                        </td>
                        <td style="width:20%;">
                            Bobingen, den 12.01.2020
                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;height:50px;padding:0px 10px;" colspan="2">

                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%; font-weight: bold;padding:10px;" colspan="2">
                            <span style="text-decoration: underline;">Bestätigung / Rechnung Nr.</span> : &nbsp; {{$entry->invoice_number}}
                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;padding:10px;text-decoration: underline;" colspan="2">
                            Wir danken Ihnen für Ihr Vertrauen und freuen uns, Ihre Reservation wie folgt zu bestätigen:
                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;font-weight: bold;padding:0px 10px;text-decoration: underline;" colspan="2">
                            Teilnehmer
                        </td>
                    </tr>
                    <tr style="margin-bottom:50px">
                        <td style="width:100%;padding:0px 10px;">
                            <table style="width:100%;">
                                @foreach($entry->activity_participants as $activy_user)
                                    <tr>
                                        <td style="width:30%">
                                            {{$activy_user['gender']}}
                                        </td>
                                        <td style="width:30%">
                                            {{$activy_user['first_name']}}
                                        </td>
                                        <td style="width:40%">
                                            {{$activy_user['last_name']}}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;height:50px;padding:0px 10px;" colspan="2">

                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0px 10px;font-weight: bold;text-decoration: underline" colspan="2">
                            Leistung:
                        </td>

                    </tr>
                    <tr>
                        <td style="padding:0px 10px;" colspan="2">
                            Flughafentransfer / Flughafen – Hotel – Flughafen
                        </td>

                    </tr>
                    <tr>
                        <td style="padding:0px 10px;" colspan="2">
                            {{$entry->activity_place}}
                        </td>

                    </tr>
                    <tr>
                        <td style="padding:0px 10px;" colspan="2">
                            <span style="text-decoration:underline;"> Check In:</span> {{$entry->activity_check_in}}
                            <span style="text-decoration:underline;">Check Out:</span> {{$entry->activity_check_out}}

                        </td>
                    </tr>
                    <tr>
                        <td style="width:80%;padding:0px 10px;">

                            @foreach($entry->activity_rooms as $activy_room)
                                {{$activy_room['amount']}} {{$activy_room['type']}}
                            @endforeach
                            <br>
                            Ultra All Inklusive
                        </td>
                        <td style="width:20%;padding:0px 10px;vertical-align: bottom;">
                            {{$entry->price_activity}},00 EUR
                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;height:50px;padding:0px 10px;" colspan="2">

                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;padding:0px 10px;font-weight: bold;text-decoration: underline;" colspan="2">
                            Extraleistung:
                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;padding:0px 10px;font-weight: bold;" colspan="2">
                            Fluggesellschaft: Sun Express
                        </td>
                    </tr>
                    <tr>
                        <td style="width:80%;padding:0px 10px;">
                            <table style="width:100%;">
                                <tr>
                                    <td style="width:10%">
                                        Tarih
                                    </td>
                                    <td style="width:20%">
                                        Ucak Kodu
                                    </td>
                                    <td style="width:30%">
                                        Nerden - Nereye
                                    </td>
                                    <td style="width:20%">
                                        Kalkis Inis
                                    </td>
                                </tr>
                                @foreach($entry->activity_flight_tickets as $activy_flight_info)
                                    <tr>
                                        <td style="width:10%">
                                            {{$activy_flight_info['departure_date']}}
                                        </td>
                                        <td style="width:20%">
                                            {{$activy_flight_info['pnr']}}
                                        </td>
                                        <td style="width:30%">
                                            {{$activy_flight_info['origin']}}-{{$activy_flight_info['destination']}}
                                        </td>
                                        <td style="width:20%">
                                            <table style="width:100%;">
                                                <tr>
                                                    <td style="width:50%;">
                                                        Abflug:
                                                    </td>
                                                    <td style="width:50%;">
                                                        {{$activy_flight_info['arrival_time']}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:10%">

                                        </td>
                                        <td style="width:20%">

                                        </td>
                                        <td style="width:30%">

                                        </td>
                                        <td style="width:20%">
                                            <table style="width:100%;">
                                                <tr>
                                                    <td style="width:50%;">
                                                        Ankunft:
                                                    </td>
                                                    <td style="width:50%;">
                                                        {{$activy_flight_info['departure_time']}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                        <td style="width:20%;padding:0px 10px;">

                        </td>
                    </tr>
                    <tr>
                        <td style="width:80%;padding:0px 10px;">
                            Inkl. Golfgepäckbeförderung. / angemeldet.
                        </td>
                        <td style="width:20%;padding:0px 10px;vertical-align: bottom;">
                            {{$entry->price_flight}},00 EUR
                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;height:50px;padding:0px 10px;" colspan="2">

                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;padding:0px 10px;font-weight: bold;text-decoration: underline;" colspan="2">
                            Golfleistung:
                        </td>
                    </tr>
                    <tr>
                        <td style="width:80%;padding:0px 10px;">
                            <table style="width:100%;">
                                @foreach($entry->activity_program as $activy_plan)
                                    <tr>
                                        <td style="width:10%;">
                                            {{$activy_plan['date']}}
                                        </td>
                                        <td style="width:20%;">
                                            {{$activy_plan['place']}}
                                        </td>
                                        <td style="width:10%;">
                                            {{$activy_plan['time']}}
                                        </td>
                                        <td style="width:10%;">
                                            {{$activy_plan['participant_count']}}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">
                                        ** Shuttle Transfer Inklusive **
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width:20%;padding:0px 10px;vertical-align: bottom;">

                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;height:50px;padding:0px 10px;" colspan="2">

                        </td>
                    </tr>
                    <tr class="selam">
                        <td style="width:100%;padding:0px 10px;" colspan="2">
                            <table style="width:100%; border-spacing: 0px;">
                                <tr>
                                    <td style="width:23%;padding:0px 10px;border:1px solid #000;border-collapse: collapse; border-right: none;border-bottom: none;">
                                        FA GOLFREISEN
                                    </td>
                                    <td style="width:33%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-right: none;border-bottom: none;">
                                        Tel: (+49) 08234 42980
                                    </td>
                                    <td style="width:43%;padding:0px 10px;border:1px solid #000;border-collapse: collapse; border-bottom: none;">
                                        Raiffeisenbank Bobingen
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:23%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-right: none;border-bottom: none;">
                                        Baltenstr. 4 B
                                    </td>
                                    <td style="width:33%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-right: none;border-bottom: none;">
                                        Email: <a href="#">golf@fa-golf.com</a>
                                    </td>
                                    <td style="width:43%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-bottom: none;">
                                        Iban: DE61100110012626633974n
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:23%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-right: none;border-bottom: none;">
                                        86399 Bobingen
                                    </td>
                                    <td style="width:33%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-right: none;border-bottom: none;">
                                        Web: <a href="#">golf@fa-golf.com</a>
                                    </td>
                                    <td style="width:43%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-bottom: none;">
                                        BIC: BOIFSE45F
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:23%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-right: none;">
                                        Deutschland
                                    </td>
                                    <td style="width:33%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-right: none;">
                                        Inhaber: Fadil Yildirim
                                    </td>
                                    <td style="width:43%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:80%;padding:0px 10px;">

                        </td>
                        <td style="width:20%; padding:0px 10px;">
                            <img src="http://anlshn.com/testforpdf/logo.jpg" alt="#" style="width:200px;height:auto;">
                        </td>


                    </tr>
                    <tr>
                        <td style="width:100%;height:50px;padding:0px 10px;" colspan="2">

                        </td>
                    </tr>
                    <tr>
                        <td style="width:80%;padding:0px 10px; ">
                            Reiseversicherung:
                            <br>
                            Keine Versicherung gewünscht.,
                            <br>
                            Preise nur gültig für Reisende mit Wohnsitz in EU.
                            <br>
                            &nbsp;
                            <br>
                            &nbsp;
                        </td>
                        <td style="width:20%;vertical-align: bottom">
                            -----------------
                            <br>
                            &nbsp;
                            {{$entry->price_total}},00 EUR
                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;height:50px;padding:0px 10px;" colspan="2">

                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;height:50px;padding:0px 10px;font-weight: bold;" colspan="2">
                            Wir erbitten eine Anzahlung von {{$depozit = $entry->price_total * 0.25}} EUR nach Rechnungserhalt.
                            <br>
                            Der Restbetrag von {{$entry->price_total - $depozit}} EUR ist bis zum {{$entry->payment_due_date}} fällig.
                            <br>
                            Bitte überweisen Sie den Rechnungsbetrag auf das umseitig genannte Konto,
                            <br>
                            unbedingt mit der Angabe der Rechnungsnummer.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;height:50px;padding:0px 10px;" colspan="2">

                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;height:50px;padding:0px 10px;font-weight: bold;" colspan="2">
                            **RECHNUNG NR: 55974234**
                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;height:50px;padding:0px 10px;" colspan="2">

                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;height:50px;padding:0px 10px;font-weight: bold;" colspan="2">
                            ZAHLUNGSEMPFÄNGER: FA GOLFREISEN

                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;height:50px;padding:0px 10px;font-weight: bold;" colspan="2">
                            Mit freundlichen Grüßen
                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;height:50px;padding:0px 10px;" colspan="2">

                        </td>
                    </tr>
                    <tr>
                        <td style="width:100%;height:50px;padding:0px 10px;font-weight: bold;" colspan="2">
                            Die AGB des Reiseveranstalters wurden anerkannt und sind Bestandteil des Vertrages.

                        </td>
                    </tr>
                    <tr class="selam">
                        <td style="width:100%;padding:0px 10px;" colspan="2">
                            <table style="width:100%; border-spacing: 0px;">
                                <tr>
                                    <td style="width:23%;padding:0px 10px;border:1px solid #000;border-collapse: collapse; border-right: none;border-bottom: none;">
                                        FA GOLFREISEN
                                    </td>
                                    <td style="width:33%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-right: none;border-bottom: none;">
                                        Tel: (+49) 08234 42980
                                    </td>
                                    <td style="width:43%;padding:0px 10px;border:1px solid #000;border-collapse: collapse; border-bottom: none;">
                                        Raiffeisenbank Bobingen
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:23%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-right: none;border-bottom: none;">
                                        Baltenstr. 4 B
                                    </td>
                                    <td style="width:33%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-right: none;border-bottom: none;">
                                        Email: <a href="#">golf@fa-golf.com</a>
                                    </td>
                                    <td style="width:43%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-bottom: none;">
                                        Iban: DE61100110012626633974n
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:23%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-right: none;border-bottom: none;">
                                        86399 Bobingen
                                    </td>
                                    <td style="width:33%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-right: none;border-bottom: none;">
                                        Web: <a href="#">golf@fa-golf.com</a>
                                    </td>
                                    <td style="width:43%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-bottom: none;">
                                        BIC: BOIFSE45F
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:23%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-right: none;">
                                        Deutschland
                                    </td>
                                    <td style="width:33%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;border-right: none;">
                                        Inhaber: Fadil Yildirim
                                    </td>
                                    <td style="width:43%;padding:0px 10px;border:1px solid #000;border-collapse: collapse;">

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<button class="download-button">Download</button>

<script type="text/javascript">
    var elmBtn = document.querySelector('.download-button');
    elmBtn.addEventListener('click', function(e) {
        window.print();
    }, false);
</script>
</body>

</html>
