<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <style>

        @page {
            size: A4 landscape;
            margin: 0;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }

        body {
            font-family: Georgia, "Times New Roman", serif;
            background: #fffdf8;
        }

        .page {
            width: 100%;
            height: 100%;
            position: relative;
            background: #fffdf8;
        }

        /* Outer border */

        .outer {
            position: absolute;

            top: 8mm;
            left: 8mm;
            right: 8mm;
            bottom: 8mm;

            border: 3px solid #1d3557;
        }

        /* Inner border */

        .inner {
            position: absolute;

            top: 4px;
            left: 4px;
            right: 4px;
            bottom: 4px;

            border: 1px solid #c9a227;
        }

        /* Corner decorations */

        .corner {
            position: absolute;

            width: 16px;
            height: 16px;

            border-color: #111;
        }

        .tl {
            top: 8px;
            left: 8px;

            border-top: 2px solid;
            border-left: 2px solid;
        }

        .tr {
            top: 8px;
            right: 8px;

            border-top: 2px solid;
            border-right: 2px solid;
        }

        .bl {
            bottom: 8px;
            left: 8px;

            border-bottom: 2px solid;
            border-left: 2px solid;
        }

        .br {
            bottom: 8px;
            right: 8px;

            border-bottom: 2px solid;
            border-right: 2px solid;
        }

        /* Organization */

        .organization {
            position: absolute;

            top: 12mm;
            right: 15mm;

            font-size: 10px;

            letter-spacing: 1px;

            color: #777;
        }

        /* Main content */

        .content {
            position: absolute;

            top: 30mm;
            left: 20mm;
            right: 20mm;

            text-align: center;
        }

        .label {
            font-size: 13px;

            letter-spacing: 5px;

            color: #c9a227;

            text-transform: uppercase;

            margin-bottom: 4px;
        }

        .title {
            font-size: 38px;

            letter-spacing: 4px;

            color: #1d3557;

            font-weight: bold;

            text-transform: uppercase;

            margin-bottom: 8px;
        }

        .presented {
            font-size: 15px;

            color: #555;

            margin-bottom: 8px;
        }

        .student {
            font-size: 34px;

            font-weight: bold;

            letter-spacing: 2px;

            color: #111;

            text-transform: uppercase;

            margin-bottom: 7px;
        }

        .gold-line {
            width: 60%;

            border-top: 1px solid #c9a227;

            margin: 0 auto 10px auto;
        }

        .completion {
            font-size: 14px;

            color: #444;

            margin-bottom: 5px;
        }

        .course {
            font-size: 24px;

            font-weight: bold;

            color: #1d3557;

            margin-bottom: 10px;
        }

        .details {
            font-size: 12px;

            color: #555;
        }

        .number {
            font-weight: bold;

            color: #1d3557;
        }

        /* Seal */

        .seal {
            position: absolute;

            left: 50%;
            margin-left: -12mm;

            bottom: 18mm;

            width: 24mm;
            height: 24mm;

            border: 2px solid #c9a227;

            border-radius: 50%;

            text-align: center;

            font-size: 8px;

            font-weight: bold;

            color: #c9a227;

            letter-spacing: 1px;

            padding-top: 9mm;
        }

        /* Signatures */

        .signatures {
            position: absolute;

            left: 20mm;
            right: 20mm;

            bottom: 15mm;

            width: calc(100% - 40mm);

            text-align: center;
        }

        .signature {
            width: 40%;

            display: inline-block;

            margin: 0 4%;
        }

        .signature-line {
            border-top: 1px solid #555;

            margin-bottom: 5px;
        }

        .signature-text {
            font-size: 11px;

            color: #444;
        }

    </style>

</head>

<body>

<div class="page">

    <div class="outer">

        <div class="inner">

            <!-- Corners -->

            <div class="corner tl"></div>
            <div class="corner tr"></div>
            <div class="corner bl"></div>
            <div class="corner br"></div>


            <!-- Organization -->

            <div class="organization">
                CERTIFICATE SYSTEM
            </div>


            <!-- Main Content -->

            <div class="content">

                <div class="label">
                    Certificate of
                </div>

                <div class="title">
                    Completion
                </div>

                <div class="presented">
                    This certificate is proudly presented to
                </div>

                <div class="student">
                    {{ $certificate->student->name }}
                </div>

                <div class="gold-line"></div>

                <div class="completion">
                    for successfully completing the course
                </div>

                <div class="course">
                    {{ $certificate->course }}
                </div>

                <div class="details">

                    Certificate No:

                    <span class="number">
                        {{ $certificate->certificate_number }}
                    </span>

                    &nbsp;&nbsp; | &nbsp;&nbsp;

                    Issued:

                    {{ $certificate->issued_at->format('F d, Y') }}

                </div>

            </div>


            <!-- Seal -->

            <div class="seal">

                VERIFIED<br>
                CERTIFICATE

            </div>


            <!-- Signatures -->

            <div class="signatures">

                <div class="signature">

                    <div class="signature-line"></div>

                    <div class="signature-text">
                        Authorized Signature
                    </div>

                </div>


                <div class="signature">

                    <div class="signature-line"></div>

                    <div class="signature-text">
                        Director
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>