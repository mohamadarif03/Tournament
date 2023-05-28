@php use App\Enums\ProductStatusEnum;use App\Enums\ProductTypeEnum;use App\Helpers\CurrencyHelper;use Carbon\Carbon; @endphp

<div
    style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#ffffff;color:#718096;height:100%;line-height:1.4;margin:0;padding:0;width:100%!important">

    <table width="100%" cellpadding="0" cellspacing="0" role="presentation"
           style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#edf2f7;margin:0;padding:0;width:100%">
        <tbody>
        <tr>
            <td align="center"
                style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
                <table width="100%" cellpadding="0" cellspacing="0" role="presentation"
                       style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';margin:0;padding:0;width:100%">
                    <tbody>
                    <tr>
                        <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';padding:25px 0;text-align:center">
                            <img width="20%" src="{{ config('app.url') . 'storage/' . $site->logo }}" alt="Logo">
                        </td>
                    </tr>


                    <tr>
                        <td width="100%" cellpadding="0" cellspacing="0"
                            style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#edf2f7;border-bottom:1px solid #edf2f7;border-top:1px solid #edf2f7;margin:0;padding:0;width:100%">
                            <table class="m_-1691184708288144981inner-body" align="center" width="570" cellpadding="0"
                                   cellspacing="0" role="presentation"
                                   style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';background-color:#ffffff;border-color:#e8e5ef;border-radius:2px;border-width:1px;margin:0 auto;padding:0;width:570px">

                                <tbody>
                                <tr>
                                    <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100vw;padding:32px">
                                        <h1 style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color:#3d4852;font-size:18px;font-weight:bold;margin-top:0;text-align:left">
                                            Halo {{ $data['name'] }}</h1>
                                        <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                                            pembayaran anda
                                            sebesar {{ CurrencyHelper::rupiahCurrency($data['total_amount']) }}
                                            pada tanggal
                                            <b>{{ Carbon::parse($data['paid_at'])->format('d M Y H:i') }}</b>
                                            berhasil kami terima.
                                            <br>
                                        </p>

                                        @if(ProductStatusEnum::AVAILABLE->value === $data['product_status'])
                                            <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                                                Berikut adalah informasi mengenai lisensi dan pembayaran anda.
                                            </p>
                                        @else
                                            <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                                                Berikut adalah informasi mengenai pembayaran anda.
                                            </p>
                                        @endif

                                        <table
                                            style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:16px;line-height:2.5em;">
                                            @if(ProductStatusEnum::AVAILABLE->value === $data['product_status'])
                                                @if(ProductTypeEnum::CREDENTIAL->value === $data['product_type'])
                                                    <tr>
                                                        <td><b>USERNAME</b></td>
                                                        <td>:</td>
                                                        <td><b>{{ $data['licenses']['username'] }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>PASSWORD</b></td>
                                                        <td>:</td>
                                                        <td><b>{{ $data['licenses']['password'] }}</b></td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td><b>SERIAL KEY</b></td>
                                                        <td>:</td>
                                                        <td><b>{{ $data['licenses']['serial_key'] }}</b></td>
                                                    </tr>
                                                @endif
                                            @endif
                                            <tr>
                                                <td>Kode Pembayaran</td>
                                                <td>:</td>
                                                <td>{{ $data['invoice_id'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Produk</td>
                                                <td>:</td>
                                                <td>{{ $data['pack_name'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Harga Produk</td>
                                                <td>:</td>
                                                <td>{{ CurrencyHelper::rupiahCurrency($data['pack_price']) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Pembelian</td>
                                                <td>:</td>
                                                <td>{{ $data['quantity'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Pembayaran Via</td>
                                                <td>:</td>
                                                <td>{{ $data['payment_channel'] }}</td>
                                            </tr>
                                        </table>
                                        <br>

                                        @if(ProductStatusEnum::PREORDER->value === $data['product_status'])
                                            Pesanan anda akan segera kami proses dan akan kami kirimkan melalui email
                                            dalam waktu maksimal 2 hari.
                                            <br><br>
                                        @endif

                                        Berikut juga kami lampirkan terkait dokumen tata cara penggunaan dan
                                        aktivasi dari lisensi yang dibeli.

                                        <br><br>Terimakasih telah membeli produk
                                        di <a href="{{ config('app.url') }}"
                                              target="_blank">{{ config('app.site') }}</a>

                                        <br><br>

                                        <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';font-size:16px;line-height:1.5em;margin-top:0;text-align:left">
                                            Regards,<br>
                                            {{ config('app.name') }}</p>


                                        <table width="100%" cellpadding="0" cellspacing="0" role="presentation"
                                               style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';border-top:1px solid #e8e5ef;margin-top:25px;padding-top:25px">
                                            <tbody>
                                            <tr>
                                                <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
                                                    <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';line-height:1.5em;margin-top:0;text-align:left;font-size:14px">
                                                        Jika anda memiliki pertanyaan, hubungi: <span
                                                            style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';word-break:break-all"><a
                                                                href="mailto:{{ config('app.site_support')  }}"
                                                                style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';color:#3869d4"
                                                                target="_blank">{{ config('app.site_support')  }}</a></span>
                                                    </p>

                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'">
                            <table class="m_-1691184708288144981footer" align="center" width="570" cellpadding="0"
                                   cellspacing="0" role="presentation"
                                   style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';margin:0 auto;padding:0;text-align:center;width:570px">
                                <tbody>
                                <tr>
                                    <td align="center"
                                        style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100vw;padding:32px">
                                        <p style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';line-height:1.5em;margin-top:0;color:#b0adc5;font-size:12px;text-align:center">
                                            © 2022 {{ config('app.name') }}. All rights reserved.</p>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <img width="1" height="1"
         src="https://ci5.googleusercontent.com/proxy/C2oUh09riaMbeuxBQmTe0Ow0OI-fqeWup2o3s3WgWbeSLv4y2qM57JyogsHrRhP7unSLBawJcakVOhW7ylFWnoUe8pcQdkOKKX8YMAi8b0Hc0AvrQWiIMz9JAaDiXWnrJXYi8SF_nM90CHHbeJzhxL8VvdUO5OPPWuUSUwcUebKJ8SW-UfieZNTJO6jZmD-DerZB2rP48KOH5iz3nwQkRzKr_0mKiaCFDvwTfdFUCTvBazk2fPhJ8_6vWEigUvjB9M3VN8k-hCH0ozkRCGoRuCPmxdAKAtGv4JZ6WCQv4lcg3j-TXQSDFMCa=s0-d-e1-ft#https://ecfabgg.r.af.d.sendibt2.com/tr/op/AcWerahdjqjASLpPwnuVckFdmC-_P0Zfs-cKn0G_0rKFK7GYo8hHnAqHGKXOW-dqLE4Ncp_9ur0tve5ILBFSd-_q9IpDg_Yl-QToZKozavWbV1W3nhFkx8_TRn1W31spzDr4Z275QcTAG3SQPZ5RknTqoH_gVw8yMbgwBPXUo5Vg"
         alt="" class="CToWUd" data-bit="iit"></div>
