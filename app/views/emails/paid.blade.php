@extends('emails.template')

@section('catchPhrase')
FraucCityWide donation received 
@stop

@section('content')
    <!-- START OF FEATURED AREA BLOCK--> 
    <table width="100%" align="center" bgcolor="#f5f5f6" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td valign="top" width="100%">
          <table align="center" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td width="100%">
                <table class="table_scale" width="600" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td width="100%">
                      <table width="600" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                          <td class="spacer" width="30"> </td>
                          <td width="540">
                            <table class="full" bgcolor="#3399CC" align="left" width="540" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
                              <!-- START OF IMAGE--> 
                              <tr>
                                <td class="center" bgcolor="#FFFFFF" align="left" style="margin: 0; font-size:13px ; color:#aaaaaa; font-family: 'PT Sans', Helvetica, Arial, sans-serif; line-height: 23px;mso-line-height-rule: exactly;"> <span> Brought to you by:</span> </td>
                              </tr>                              
                              <tr>
                                <td align="center" style="margin: 0; font-size:13px ; color:#aaaaaa; font-family: 'PT Sans', Helvetica, Arial, sans-serif; line-height: 23px;"> <span> <a href="#" style="color:#3399CC;"> 
                                {{ HTML::image("img/EmailHeader600x210v2.png", "Email Header",['width' => '540', 'style' => 'display: inlne-block;', 'class' => 'img_scale']) }} </a> </span> </td>
                              </tr>
                              <!-- END OF IMAGE--> <!-- START OF HEADING--> 
                              <tr>
                                <td class="featured" align="center" style="padding-top: 20px ; padding-right: 20px ; padding-bottom: 5px ; padding-left: 20px ; text-transform: uppercase; font-family: 'PT Sans', Helvetica, Arial, sans-serif; color:#ffffff; font-size:18px; line-height:24px; mso-line-height-rule: exactly;"> <span>Your donation of $12 was received!</span> </td>
                              </tr>
                              <!-- END OF HEADING--> <!-- START OF TEXT--> 
                              <tr>
                                <td class="featured" align="center" style="padding-top: 0px ; padding-right: 20px ; padding-bottom: 20px ; padding-left: 20px ; margin: 0; font-size:13px ; color:#ffffff; font-family: 'PT Sans', Helvetica, Arial, sans-serif; line-height: 23px;mso-line-height-rule: exactly;"> <span> Thank you for supporting a great cause in Big Brothers Big Sisters of Northern Nevada.</span> </td>
                              </tr>
                              <!-- END OF TEXT--> 
                            </table>
                          </td>
                          <td class="spacer" width="30"> </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
                <!-- START OF VERTICAL SPACER--> 
                <table bgcolor="#ffffff" class="table_scale" width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td width="100%" height="40"> &nbsp;</td>
                  </tr>
                </table>
                <!-- END OF VERTICAL SPACER--> 
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <!-- END OF FEATURED AREA BLOCK--> 
    <!-- START OF 1/1 (FULL WIDTH) COLUMN BLOCK--> 
    <table width="100%" align="center" bgcolor="#f5f5f6" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td valign="top" width="100%">
          <table align="center" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td width="100%">
                <table class="table_scale" width="600" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td width="100%">
                      <table width="600" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                          <td class="spacer" width="30"> </td>
                          <td width="540">
                            <table class="full" align="left" width="540" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
                              <!-- START OF HEADING--> 
                              <tr>
                                <td class="center" align="left" style="padding-bottom: 10px; text-transform: uppercase; font-family: 'PT Sans', Helvetica, Arial, sans-serif; color:#444444; font-size:18px; line-height:28px; mso-line-height-rule: exactly;"> <span> <a class="heading-link" href="#" style="color:#444444; text-decoration: none; font-style: normal; font-weight: normal;"> </a> </span> </td>
                              </tr>
                              <!-- END OF HEADING--> <!-- START OF TEXT--> 
                              <tr>
                                <td class="center" align="left" style="margin: 0; font-size:13px ; color:#aaaaaa; font-family: 'PT Sans', Helvetica, Arial, sans-serif; line-height: 23px;mso-line-height-rule: exactly;"> <span> Just a reminder, you can make changes to your yard sale profile by signing into your account.</span> </td>
                              </tr>
                              <!-- END OF TEXT--> <!-- START BUTTON--> 
                              <tr>
                                <td bgcolor="#ffffff" align="left" valign="top" style="padding-top: 20px;">
                                  <table border="0" align="left" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="margin: 0;">
                                    <tr>
                                      <td align="center" valign="middle" bgcolor="#ffffff" style="border: 2px solid #3399CC; padding: 5px 20px; text-transform: uppercase; font-size: 12px; line-height: 18px; font-family: 'PT Sans', Helvetica, Arial, sans-serif; color:#3399CC; margin: 0 !important; "> <a href="www.fraucCityWide.com" style="border: none; font-weight: bold; font-style: normal; color:#3399CC; text-decoration: none;"> Visit Site</a> </td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                              <!-- END BUTTON--> 
                            </table>
                          </td>
                          <td class="spacer" width="30"> </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
                <!-- START OF VERTICAL SPACER--> 
                <table bgcolor="#ffffff" class="table_scale" width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td width="100%" height="40"> &nbsp;</td>
                  </tr>
                </table>
                <!-- END OF VERTICAL SPACER--> 
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <!-- END OF 1/1 (FULL WIDTH) COLUMN BLOCK--> 
@stop