<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Rao Energy - Agreement</title>
    <style>
        body { font-family: "noto-sans-devanagari", sans-serif; font-size:12px; }
        .header { text-align:center; margin-bottom:10px; }
        .section { margin-bottom:12px; }
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #ddd; padding:6px; font-size:11px; }
        th { background:#f5f5f5; }
    </style>
   <style>
    body {
        font-family: 'NotoSansDevanagari';
        font-size: 12px;
    }
    .devanagari {
        font-family: 'NotoSansDevanagari' !important;
         letter-spacing: 1px;    /* space between characters */
          word-spacing: 3px; 
    }
    
    .devanagari-text {
    font-family: 'NotoSansDevanagari' !important;
    letter-spacing: 0.8px;     /* छोटे अक्षरों के बीच अंतर */
    word-spacing: 2px;         /* शब्दों के बीच अच्छा गैप */
    line-height: 20px;         /* paragraph readable */
}
</style>



</head>
<body>
    <div class="header">
        <div class="devanagari" style="font-size: 22px;
        font-weight: bold;
        line-height: 28px;
      ">राव एनर्जी सॉल्यूशंस</div>
        <div class="devanagari"> पगरा उर्फ परसिया, भीखमपुर रोड, देवरिया, उत्तर प्रदेश, 274001</div>
        <div>GSTIN: 09BFRPR9331G1ZS</div>
    </div>
<br><br>

   <div class="devanagari header"> साप्ताहिक किश्त भुगतान अनुबंध/शपथ पत्र</div>

    <p class="devanagari-text">
    मै <?php echo e($loan->customer->name); ?>  पुत्र/पुत्री/पत्नी <?php echo e(explode(',', $loan->customer->address)[0] ?? 'N/A'); ?>

     निवासी  <?php echo e($loan->customer->address); ?>  आज दिनांक <?php echo e(\Carbon\Carbon::parse($loan->sale_date)->format('d-m-Y')); ?> को राव एनर्जी सॉल्यूशंस से 
     <?php echo e($loan->finance_period_weeks/4); ?> बैटरी क्रय कर रहा/रही हूँ जिसकी कुल कीमत ₹ <?php echo e(number_format($loan->billed_amount,2)); ?> है 
     जिसमें से ₹ <?php echo e(number_format($loan->total_payment,2)); ?> का भुगतान कर रहा/रही हूँ और बकाया ₹ <?php echo e(number_format($loan->financed_amount,2)); ?> 
     का भुगतान मै अगले <?php echo e($loan->finance_period_weeks); ?> सप्ताह में कर दूंगा/दूंगी।
    </p>

    <p class="devanagari-text">मैं प्रत्येक सप्ताह के <?php echo e($loan->weekly_installment_day); ?> के दिन अपना साप्ताहिक किश्त जो कि ₹ 
        <?php echo e(number_format($loan->weekly_installment_amount,2)); ?> है शाम 6 बजे तक किश्त की पूरी रकम जमा कर दूंगा/दूंगी| 
        अगर मैं <?php echo e($loan->weekly_installment_day); ?> के दिन शाम 6 बजे तक साप्ताहिक किश्त की पूरी रकम नही जमा करता/करती हूँ 
        तो मैं ₹ 200 non payment penalty के रूप में राव एनर्जी सॉल्यूशंस को बकाया धनराशि में बढ़ाने की अनुमति देता/देती हूँ एवं कुल बकाया 
        राशि का 1% late payment penalty के रूप में सप्ताह के अंत में राव एनर्जी सॉल्यूशंस को बकाया धनराशि में बढ़ाने की अनुमति देता/देती हूँ।</p>
    
    <p class="devanagari-text">मैं अगर <?php echo e($loan->finance_period_weeks/4); ?> साप्ताहिक किश्त नहीं जमा करता/करती हूँ तो 
        मैं क्रय की हुई बैटरियां राव एनर्जी सॉल्यूशंस को वापस लेने की स्वैच्छिक अनुमति देता/देती हूँ एवं किसी भी प्रकार के कोई भुगतान एवं अपने द्वारा दी गयी पुराने बैटरी की वापसी  
        का दावा नहीं करूंगा/करूंगी।</p>

        <p class="devanagari-text">मैं अगर <?php echo e($loan->finance_period_weeks/2); ?>  सप्ताह में कुल बकाया धनराशि का आधा नहीं जमा करता/करती हूँ तो मैं क्रय की हुई बैटरियां राव एनर्जी सॉल्यूशंस को वापस लेने की स्वैच्छिक अनुमति देता/देती हूँ एवं किसी भी प्रकार के कोई भुगतान एवं अपने द्वारा दी गयी पुराने बैटरी की वापसी का दावा नहीं करूंगा/करूंगी।</p>
    
    <p class="devanagari-text">मैं अगर <?php echo e($loan->finance_period_weeks); ?> सप्ताह में कुल बकाया धनराशि नहीं जमा करता/करती हूँ तो मैं क्रय की हुई बैटरियां 
        राव एनर्जी सॉल्यूशंस को वापस लेने की स्वैच्छिक अनुमति देता/देती हूँ एवं किसी भी प्रकार के कोई भुगतान एवं अपने द्वारा दी गयी पुराने बैटरी की वापसी का दावा नहीं करूंगा/करूंगी।</p>
  
    <p class="devanagari-text">जिस सप्ताह मैं साप्ताहिक किश्त नहीं जमा करता/करती हूँ उस सप्ताह के अंत में मैं ₹ 200 non payment penalty के रूप में राव एनर्जी सॉल्यूशंस को 
        बकाया धनराशि में बढ़ाने की अनुमति देता/देती हूँ एवं कुल बकाया राशि का 1% late payment penalty के रूप में सप्ताह के अंत में राव एनर्जी सॉल्यूशंस 
        को बकाया धनराशि में बढ़ाने की अनुमति देता/देती हूँ।</p>

    <p class="devanagari-text">मैं राव एनर्जी सॉल्यूशन्स को बैटरी वापस देने के एक सप्ताह के भीतर अपना कुल बकाया भुगतान करने में असफल होता/होती हूँ 
        तो राव एनर्जी सॉल्यूशन्स को सभी बैटरी बेच कर अपना बकाया वसूल करने की अनुमति प्रदान करता/करती हूँ ।</p>
   
    <p class="devanagari-text">अगर  <?php echo e($loan->finance_period_weeks); ?>  सप्ताह में कुल बकाया धनराशि ( जिसमें non payment penalty और late payment penalty शामिल है ) मैं नहीं अदा कर पाता/पाती हूँ और राव एनर्जी सॉल्यूशंस क्रय की हुईं बैटरियां वापस नहीं लेते है तो मैं बकाया धनराशि ( जिसमें non payment penalty और late payment penalty शामिल है ) पर 1% late payment penalty के रूप में प्रत्येक सप्ताह के अंत में बकाया धनराशि में बढ़ाने की अनुमति राव एनर्जी सॉल्यूशंस को देता/देती हूँ।</p>
    <br><br>
    <p class="devanagari-text">दिनांक: <?php echo e(\Carbon\Carbon::parse($loan->sale_date)->format('d-m-Y')); ?> </p> 
    <p class="devanagari-text">स्थान: पगरा उर्फ परसिया, भीखमपुर रोड, देवरिया, उत्तर प्रदेश, 274001</p>
    <br>
    <p class="devanagari-text">हस्ताक्षर</p>
    



    
</body>
</html>
<?php /**PATH /home/u384460131/domains/theglobaleworld.com/public_html/raoenergy/resources/views/loans/agreement.blade.php ENDPATH**/ ?>