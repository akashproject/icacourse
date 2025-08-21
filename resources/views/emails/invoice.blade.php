<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment Successful Email</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <style>
    @media only screen and (max-width: 600px) {
      .content { width: 100% !important; }
      .two-col { display: block !important; width: 100% !important; }
      .two-col td { display: block !important; width: 100% !important; text-align: left !important; }
    }
  </style>
</head>
<body style="margin:0; padding:0; font-family:Arial, sans-serif; background-color:#f5f7fa; color:#333;">
  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f5f7fa; padding:20px 0;">
    <tr>
      <td align="center">
        <table class="content" width="600" cellpadding="0" cellspacing="0" border="0" style="background-color:#fff; border-radius:8px; overflow:hidden;">

          <!-- Header -->
          <tr>
            <td style="background-color:#ffffff;">
              <div class="logo-bar" style="width: 100%; background-color: #ffffff; padding-top: 8px;">
              <img src="logo.png" alt="" style="max-width: 165px; background-color: #fff; border-radius: 5px; padding-left: 15px;">
            </td>
          </tr>
          <tr>
            <td style="background-color:#007bff; padding:50px 20px; text-align:center;">
              <div style="color: #fff; font-size: 80px;"><i class="ri-checkbox-circle-fill"></i></div>
              <h2 style="color:#fff; font-size:22px; margin:10px 0;">Payment Successful</h2>
              <p style="color:#fff; font-size:14px; margin:0;">That thus much less heron other hello</p>
            </td>
          </tr>

          <!-- Two Column Section -->
          <tr>
            <td style="padding:20px;">
              <table width="100%" cellpadding="0" cellspacing="0" border="0" class="two-col">
                <tr>
                  <td width="50%" valign="top" style="padding:10px;">
                    <h3 style="margin:0 0 10px 0; font-size:22px; color: #000;">ICA Edu skills</h3>
                    <p style="font-size:13px; margin:0; line-height:18px;">
                      UNIT-1401, Eco Centre, Plot-O4,<br> BLOCK-EM, Sector V Saltlake, Kolkata-700091, West Bengal</p>
                      <p style="font-size:13px; margin:0; line-height:18px;">GSTIN : 19AABCIO017RIZE</p>
                      <p style="font-size:13px; margin:0; line-height:18px;">West Bengal (19)</p>
                      <p style="font-size:13px; margin:0; line-height:18px;">8820-004-000</p>
                      <p style="font-size:13px; margin:0; line-height:18px;"><a href="mailto:crm@icagroup.in"> crm@icagroup.in </a></p>
                      <p style="font-size:13px; margin:0; line-height:18px;">SAC Code : 999243</p>
                  </td>
                  <td width="50%" valign="top" style="padding:10px; padding-top: 47px; text-align:right;">
                    <p style="font-size:13px; margin:0 0 5px 0;">
                      <strong style="color: #000;">Transaction ID :</strong> {{ $data['payment_id']}}</p>
                      <strong style="color: #000;">Student Code : <span style="background: #392da3;color: #fff;padding: 5px;">{{ $data['student_code'] }}<span></strong></p>
                      <p style="font-size:13px; margin:0 0 5px 0;"><strong style="color: #000;">Date :</strong> {{ $data['date'] }}</p>
                    
                    <h3 style="margin:0 0 10px 0; font-size:22px; color: #000; margin-top: 20px; margin-bottom: 30px;">Student Details</h3>
                    <p style="font-size:13px; margin:0; line-height:18px; text-align:right;">{{ $data['first_name']}} {{ $data['last_name']}}</p>
                    <p style="font-size:13px; margin:0; line-height:18px; text-align:right;">{{ $data['mobile']}}</p>
                    <p style="font-size:13px; margin:0; line-height:18px; text-align:right;"> {{ $data['address']}}, {{ $data['city']}}, <br>{{ $data['state']}}, {{ $data['pincode']}} </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

        <!-- Price Table -->
        <tr>
            <td style="padding:10px 20px;">
                <table width="100%" cellpadding="10" cellspacing="0" border="0" style="font-size:14px; color:#333; border-collapse:collapse;">
                <tr style="background:#e6edf9; font-weight:bold;">
                    <td style="border:none;">Sl No.</td>
                    <td style="border:none;">Particulars</td>
                    <td style="border:none; text-align:right;">Amount</td>
                </tr>
                @foreach($data['order_items'] as $key => $value)
                <tr>
                    <td style="border:none;">{{$key+=1 }}</td>
                    <td style="border:none;">{{$value['name']}}</td>
                    <td style="border:none; text-align:right;">₹{{ number_format($value['amount'])}}/-</td>
                </tr>
                @endforeach
                <tr>
                    <td style="border:none;">2</td>
                    <td style="border:none; text-align:right;" colspan="2"><strong style="font-weight: 700; margin-right: 50px;">Total Course Fees :</strong> ₹ {{ number_format($data['totalCourseFee']) }} /-</td>
                </tr>
                <tr>
                    <td style="border:none;">3</td>
                    <td style="border:none; text-align:right;" colspan="2"><strong style="font-weight: 700; margin-right: 50px;">Discount :</strong> ₹{{ number_format($data['discount']) }}/-</td>
                </tr>
                <tr style="background:#e6edf9; font-weight:bold;">
                    <td colspan="2" style="border:none; text-align:right;">Total Amount Paid :</td>
                    <td style="border:none; text-align:right;">₹{{ number_format($data['amount'])}}/-</td>
                </tr>
                </table>
            </td>
        </tr>

          <!-- Footer -->
          <tr>
            <td style="padding:20px; font-size:12px; color:#555; text-align:center;">
              This is a system generated invoice and does not need any signature.<br>
              Fee once paid is not refundable. Pay within time every month to avoid penalty.
              <a href="https://www.icacourse.in/term-condition" style="color:#007bff; text-decoration:none;">T&C Apply</a>
              <br><br>
              <a href="https://www.icacourse.in/assets/frontend/files/online-course-process.pdf" style="display:inline-block; background-color:#007bff; color:#fff; font-weight:bold; padding:12px 20px; border-radius:6px; font-size:14px; text-decoration:none;">Download Course Guide</a>
              <br><br>
              Thank you for choosing ICA. We believe you will be satisfied by our services.<br><br>
              Copyright ©1999–2021 ICA EDU SKILL PVT LTD
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>