<div style="background-color: #f7f7f7; margin: 10px;">

  <strong>Ada Pesanan</strong>
  <h2>No transaksi #{{ $no_trs }}</h2>
  <p><b>Nama Customer {{ $nama_cust }},</b></p>
  <p><b>Email Customer {{ $email_cust }},</b></p>


  <p>Harga sejumlah IDR {{$ttl_harga}} dengan batas waktu pembayaran sampai : <b>{{date("d-M-Y, H:i", strtotime($batas_pembayaran))}}</b></p>
  <p>Untuk menyelesaikan order anda, harap mengikuti instruksi berikut :</p>

  <ol>
    <li>Lakukan pembayaran sejumlah IDR {{$ttl_harga}} sebelum waktu batas pesan yang ditentukan ke rekening BRI {{ $no_rek }} Atas nama Iwayan Budiarta</li>
    <li>Konfirmasi pembayaran anda dengan mengirimkan bukti pembayaran melalui email <b><a href="mailto:info@jtindonesia.com?subject=Confirm Payment">info@jtindonesia.com</a></b></li>
    <li>Dalam maksimal 12 jam tim kami akan memverifikasi bukti transfer anda.</li>
    <li>Pesanan anda akan dibatalkan otomatis jika melewati batas waktu transfer dimulai saat pesanan ini dibuat yaitu 1 jam dari pemesanan atau tidak memberikan bukti transfer selama 1 jam.</li>
  </ol>
<p>Untuk informasi lebih lanjut mengenai proses pembayaran, silakan menghubungi lewat email : <a href="mailto:info@jtindonesia.com?subject=Confirm Payment">info@jtindonesia.com</a></p>
<p>Terima Kasih atas kepercayaan Anda, <a href="JTIndonesia.com">JTIndonesia.com</a></p>


<h2>English</h2>
<strong> Waiting for Payment </strong>
  <h2> Transaction No. # {{ $no_trs }} </h2>
  <p> <b> Dear {{ $nama_cust }}, </b> </p>
  <p> Thank you for purchasing a ticket on <a href="JTIndonesia.com">JTIndonesia.com</a></p>
  <p> We are waiting for your payment, please transfer a total of IDR {{ $ttl_harga }} with the payment deadline until : <b> {{date("d-M-Y, H:i", strtotime($batas_pembayaran))}} </b> </p>
  <p> To complete your order, please follow the instructions below : </p>

  <ol>
    <li> Make a payment of IDR {{ $ttl_harga }} before the time limit for the message specified in the BRI account {{ $no_rek }} In the name of Iwayan Budiarta </li>
    <li> Confirm your payment by sending proof of payment via email <b> <a href="mailto:info@jtindonesia.com?subject=Confirm Payment">info@jtindonesia.com</a> </b> </li>
    <li> Within a maximum of 12 hours our team will verify your transfer proof. </li>
    <li> Your order will be canceled automatically if the transfer deadline starts when this order is made, ie 1 hour from the order or does not provide proof of transfer for 1 hour. </li>
  </ol>
<p> For more information about the payment process, please contact via email: <a href="mailto:info@jtindonesia.com?subject=Confirm Payment">info@jtindonesia.com</a> </p>
<p> Thank you for your trust, <a href="JTIndonesia.com">JTIndonesia.com</a> </p>

</div>
