<!DOCTYPE html>
<html>
<head>
<script>
var wpwlOptions = {
    applePay: {
    displayName: "MyStore",
    total: { label: "COMPANY, INC." }
  },
    iframeStyles: {
        'card-number-placeholder': {
            'color': 'blue',
            'font-size': '16px',
            'font-family': 'monospace'
        },
            'cvv-placeholder': {
            'color': '#0000ff',
                'font-size': '16px',
                'font-family': 'Arial'
        }
    }
}</script>    
  <script src="https://oppwa.com/v1/paymentWidgets.js?checkoutId=<?=$ini_payment->id;?>"></script>
    <form action="<?=base_url('pages/getPayStatus_test/')?>" class="paymentWidgets" data-brands=" MADA "></form>
</head>
<body>

</body>
</html>