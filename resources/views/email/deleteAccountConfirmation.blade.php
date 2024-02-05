@include('email.header')
<tr>
		<td align='left'>&nbsp;</td>
		<td style='text-align:center;font-size:20px;color:#515151;font-weight:600;'>Confirmation of {{ config('app.name') }} Account Deletion</td>
		<td align='left'>&nbsp;</td>
</tr>
<tr>
		<td colspan='3' align='center' height='1' style='padding:0px;'></td>
</tr>
<tr>
		<td align='left' style='padding-top:0px;'>&nbsp;</td>
		<td style='text-align:left;font-size:15px;color:#000;padding-top:0px;'>Dear {{ $user->name }},</td>
		<td align='left' style='padding-top:0px;'>&nbsp;</td>
</tr>
<tr>
		<td colspan='3' align='center' height='1' style='padding:0px;'></td>
</tr>
<tr>
		<td align='left' style='padding-top:0px;'>&nbsp;</td>
		<td style='text-align:left;font-size:15px;color:#000;padding-top:0px;'>Click on the link below to delete the
				verification process.</td>
		<td align='left' style='padding-top:0px;'>&nbsp;</td>
</tr>
<tr>
		<td colspan='3' align='center' height='30' style='padding:0px;'></td>
</tr>
<tr>
		<td align='center'>&nbsp;</td>
		<td align='center'><a href="{{ $deleteLink }}"
						style='color:#fff;padding:14px 22px;text-decoration:none;background-color:#fb5151;text-transform:uppercase;font-size:15px;font-weight:600;'>Delete Account</a></td>
		<td align='center'>&nbsp;</td>
</tr>
<tr>
		<td colspan='3' align='center' height='30' style='padding:0px;'></td>
</tr>
<!--
href="{{ route('sendEmailDone', ['email' => \Crypt::encryptString($user->email), 'verifyToken' => $user->id]) }}" -->
@include('email.footer')
