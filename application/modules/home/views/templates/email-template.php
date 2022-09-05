<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <style>
      td.padding-copy a {color: #241f6a !important; text-decoration: none !important;}
    </style>
  </head>
  <body style="margin: 0; padding: 10px;">
  
    <!-- Header -->
      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
        <tr>
          <td bgcolor="#ffffff">
            <div align="center" style="padding: 0px 15px 0px 15px;">
              <table border="0" cellpadding="0" cellspacing="0" width="500" class="wrapper">
                <tr>
                  <td style="padding: 20px 0px 30px 0px;" class="logo">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tr>
                        <td bgcolor="#ffffff" width="100" align="left"><a href="<?= base_url(); ?>" target="_blank"><img alt="Logo" src="<?= base_url(); ?>assets/home/images/logo.png" width="150" height="68" style="height:auto; margin: 0 auto; display:block;" border="0"></a></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </div>
          </td>
        </tr>
      </table>
    <!-- End -->

    <!-- Body -->
      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
        <tr>
          <td bgcolor="#ffffff" align="center" class="section-padding">
            <table border="0" cellpadding="0" cellspacing="0" width="500" class="responsive-table">
              <tr>
                <td>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">                            
                    <tr>
                      <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tbody style="background: #fff; padding: 20px 20px 20px 20px; ">
                          <tr>
                            <td text-align="center" style="font-size: 22px; font-weight: 600; font-family: Helvetica, Arial, sans-serif; text-align: center; color: #000; padding: 10px 40px 0px 48px;" class="padding-copy">
                              Here is your OTP Link for reset password
                            </td>
                          </tr>
                          <tr>
                            <td text-align="center" style="padding: 10px 70px 0px 48px; font-size: 17px; line-height: 25px; text-align: center; font-family: Helvetica, Arial, sans-serif; color: #000;" class="padding-copy">
                            <a href="<?= base_url(); ?>resetpassword/<?= $auth_Number; ?>">Reset Link</a>
                          </tr>
                        </tbody>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    <!-- End -->

    <!-- Footer -->
      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
        <tr>
          <td bgcolor="#ffffff" align="center">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td style="padding: 20px 0px 20px 0px;">              
                  <table width="500" border="0" cellspacing="0" cellpadding="0" align="center" class="responsive-table">
                    <tr>
                      <td align="center" valign="middle" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                        <a class="original-only" style="color: #666666; text-decoration: none;">www.test.com</a>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    <!-- End -->
  </body>
</html>