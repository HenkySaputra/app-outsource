<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

@include('umum.Email.invoice_header')

<body>
    <span class="preheader">This is an invoice for your purchase on {{ now() }}. Please submit payment by
        {{ now() }}</span>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td class="email-masthead">
                            <a href="javascript:void(0)" class="f-fallback email-masthead_name">
                                INTEK Outsource
                            </a>
                        </td>
                    </tr>
                    <!-- Email Body -->
                    <tr>
                        <td class="email-body" width="570" cellpadding="0" cellspacing="0">
                            <table class="email-body_inner" align="center" width="570" cellpadding="0"
                                cellspacing="0" role="presentation">
                                <!-- Body content -->
                                <tr class="card">
                                    <td class="content-cell">
                                        <div class="f-fallback">
                                            <h1>Hi {{ 'name' }},</h1>
                                            <p>Thanks for using INTEK Outsource. This is an invoice for your recent
                                                purchase.</p>
                                            <table class="attributes" width="100%" cellpadding="0" cellspacing="0"
                                                role="presentation">
                                                <tr>
                                                    <td class="attributes_content">
                                                        <table width="100%" cellpadding="0" cellspacing="0"
                                                            role="presentation">
                                                            <tr>
                                                                <td class="attributes_item">
                                                                    <span class="f-fallback">
                                                                        <strong>Amount Due:</strong>
                                                                        {{ 'Rp. 1.000.000' }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="attributes_item">
                                                                    <span class="f-fallback">
                                                                        <strong>Due By:</strong> {{ now() }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!-- Action -->
                                            <table class="body-action" align="center" width="100%" cellpadding="0"
                                                cellspacing="0" role="presentation">
                                                <tr>
                                                    <td align="center">
                                                        <!-- Border based button
           https://litmus.com/blog/a-guide-to-bulletproof-buttons-in-email-design -->
                                                        <table width="100%" border="0" cellspacing="0"
                                                            cellpadding="0" role="presentation">
                                                            <tr>
                                                                <td align="center">
                                                                    <a href="javascript:void(0)"
                                                                        class="f-fallback button button--green"
                                                                        target="_blank">Pay Invoice</a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table class="purchase" width="100%" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td>
                                                        <h3>{{ 'invoice_id' }}</h3>
                                                    </td>
                                                    <td>
                                                        <h3 class="align-right">{{ now() }}</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <table class="purchase_content" width="100%" cellpadding="0"
                                                            cellspacing="0">
                                                            <tr>
                                                                <th class="purchase_heading" align="left">
                                                                    <p class="f-fallback">Description</p>
                                                                </th>
                                                                <th class="purchase_heading" align="right">
                                                                    <p class="f-fallback">Amount</p>
                                                                </th>
                                                            </tr>
                                                            {{ '#each invoice_details' }}
                                                            <tr>
                                                                <td width="80%" class="purchase_item"><span
                                                                        class="f-fallback">{{ 'description' }}</span>
                                                                </td>
                                                                <td class="align-right" width="20%"
                                                                    class="purchase_item"><span
                                                                        class="f-fallback">{{ 'amount' }}</span>
                                                                </td>
                                                            </tr>
                                                            {{ '/each' }}
                                                            <tr>
                                                                <td width="80%" class="purchase_footer"
                                                                    valign="middle">
                                                                    <p
                                                                        class="f-fallback purchase_total purchase_total--label">
                                                                        Total</p>
                                                                </td>
                                                                <td width="20%" class="purchase_footer"
                                                                    valign="middle">
                                                                    <p class="f-fallback purchase_total">
                                                                        {{ 'total' }}</p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <p>If you have any questions about this invoice, simply reply to this email
                                                or reach out to our <a href="javascript:void(0)">support team</a> for
                                                help.</p>
                                            <p>Cheers,
                                                <br>The INTEK Outsource team
                                            </p>
                                            <!-- Sub copy -->
                                            <table class="body-sub" role="presentation">
                                                <tr>
                                                    <td>
                                                        <p class="f-fallback sub">If you’re having trouble with the
                                                            button above, copy and paste the URL below into your web
                                                            browser.</p>
                                                        <p class="f-fallback sub">
                                                            {{ 'https://www.indoteknokarya.com/' }}</p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="email-footer" align="center" width="570" cellpadding="0"
                                cellspacing="0" role="presentation">
                                <tr>
                                    <td class="content-cell" align="center">
                                        <p class="f-fallback sub align-center">
                                            PT. Indoteknokarya
                                            <br>1234 Street Rd.
                                            <br>Suite 1234
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
