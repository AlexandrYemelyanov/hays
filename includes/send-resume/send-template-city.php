<?php

/***
 ****    SIMULAR POST
 ***/
logTxt( 'POST_ID = ' . $job_id, 'send_mail_notification' );

$AllQuery = simular_vacancies( $job_id );
$simularVacancies = '';
foreach ( $AllQuery as $post ) {
	$industrysItem = get_the_terms( $post->ID, 'industry' ) ?: '';
	$locationsItem = get_the_terms( $post->ID, 'locations' ) ?: '';

	$simularVacancies .= '<li style="font-size: 14px;line-height: 20px;color: rgb(0, 0, 0);"><a style="font-size: 16px; color: rgb(0, 176, 240);text-decoration-line: none" href=' . get_the_permalink( $post->ID ) . '>' . get_field( "job_title", $post->ID ) . '</a><br>Местоположение:<em>';
	if ( is_array( $locationsItem ) AND count( $locationsItem ) ) {
		foreach ( $locationsItem as $k => $lIte ) {
			if ( $k ) {
				$simularVacancies .= $lIte->name;
			}
		}
	}
	$simularVacancies .= '</em></li><br>';
}
wp_reset_query();
/*		end-SIMULAR POST	*/

echo '<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<!--[if gte mso 9]>
	<xml>
		<o:OfficeDocumentSettings>
			<o:AllowPNG/>
			<o:PixelsPerInch>96</o:PixelsPerInch>
		</o:OfficeDocumentSettings>
	</xml><![endif]-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Спасибо за ваше резюме</title>
	<style ee-render="block"><!--
		.ExternalClass p {
			MARGIN: 0px;
		}

		@media screen and (max-width: 480px) {
			.eem_font22 {
				font-size: 22px !important;
			}

			.eem_center {
				text-align: center !important;
				margin: auto;
			}
		}

		-->
	</style>
	<style ee-render="block">
		<!--
		@media only screen and (max-device-width: 480px), only screen and (max-width: 640px) and (-webkit-min-device-pixel-ratio: 1.1), only screen and (-webkit-min-device-pixel-ratio: 2.1) {
			[class~=hide], [class~=hide] * {
				display: none !important;
			}
		}

		-->
	</style>
	<style type="text/css" id="editor_required_block" ee-render="block">body, html {
			Margin: 0 !important;
			padding: 0 !important;
			width: 100% !important
		}

		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%
		}

		div[style*="margin: 16px 0"] {
			margin: 0 !important
		}

		table, td {
			mso-table-lspace: 0 !important;
			mso-table-rspace: 0 !important
		}

		table {
			border-spacing: 0 !important;
			border-collapse: collapse !important;
			table-layout: auto !important
		}

		img {
			-ms-interpolation-mode: bicubic
		}

		.yshortcuts a {
			border-bottom: none !important
		}

		.mobile-link--footer a, a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: underline !important
		}

		.email-width, .row {
			Margin: 0 auto !important
		}

		img.ee_noresponsiveresize {
			max-width: 100% !important
		}

		@media screen and (max-width: 504px) {
			.row .stack-column {
				display: block !important;
				width: 100% !important;
				max-width: 100% !important;
				direction: ltr !important;
				min-width: 100% !important
			}

			body .ee-show-on-desktop {
				display: none !important
			}

			table .ee-hide-on-desktop {
				display: table;
				max-height: none;
				visibility: visible;
				width: 100% !important
			}

			.email-width {
				width: 100vw !important
			}
		}

		@media only screen and (min-width: 505px) {
			.row .stack-column {
				min-width: 0 !important
			}

			.ee-show-on-desktop {
				display: block !important
			}

			table.ee-show-on-desktop {
				display: table !important
			}

			.ee_columns.ee-hide-on-desktop, .ee_element.ee-hide-on-desktop {
				display: none !important
			}
		}

		[owa] .no-stack-column, [owa] .stack-column {
			Margin: 0 -2px;
			float: none;
			display: inline-block !important
		}

		.stack-column {
			min-width: 0 !important
		}

		body .stack-column {
			min-width: 100% !important
		}

		[owa] .ee-show-on-desktop {
			display: block !important
		}

		[owa] table.ee-show-on-desktop {
			display: table !important
		}

		.ee-hide-on-desktop {
			visibility: hidden;
			width: 0 !important;
			max-height: 0;
			display: block
		}

		body .ee-hide-on-desktop {
			visibility: visible;
			width: 100% !important;
			display: table;
			max-height: none
		}

		#MessageViewBody .ee-show-on-desktop {
			display: none !important
		}</style>
	<!--[if mso]>
	<style>
		* {
			font-family: sans-serif !important;
		}

		.button-wrapper {
			padding: 12px 16px 12px 16px;
		}
	</style>
	<![endif]--><!--[if gte mso 9]>
	<style type="text/css">
		.stack-column {
			width: 100% !important;
		}

		.no-stack-column {
			width: 100% !important;
		}
	</style>
	<![endif]--><!--[if mso]>
	<style>
		.no-stack-column {
			width: 100% !important;
		}

		.stack-column {
			width: 100% !important;
		}
	</style>
	<![endif]--><!--[if mso]>
	<style>
		.banner {
			width: 900 !important;
		}
	</style>
	<![endif]-->

	<style ee-render="block">
		<!--
		.button-td:hover .button-a {
			transition: all 100ms ease-in;
			background: rgba(255, 255, 255, 0.2) !important;
		}

		-->
	</style>
	<style ee-render="block"><!--
		@media screen and (max-width: 480px) {
			.w105 {
				width: 105px !important;
			}

			.w145 {
				width: 145px !important;
			}

			.textcenter {
				text-align: center !important;
				margin: 0px !important;
			}

			.hideall {
				display: none !important;
				padding: 0 !important;
				margin: 0 !important;
				font-size: 1px !important;
				line-height: 1px !important;
				width: 1% !important;
			}
		}

		--></style>
	<style ee-render="block">
		<!--
		@media only screen and (max-device-width: 480px), only screen and (max-width: 640px) and (-webkit-min-device-pixel-ratio: 1.1), only screen and (-webkit-min-device-pixel-ratio: 2.1) {
			img[class~=ee_videothumb], table[class~=ee_videolink_player] {
				height: auto !important;
				max-width: 600px !important;
				width: 100% !important;
			}
		}

		--></style>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body style="font-family: Arial, sans-serif">
<!-- Easy Editor -->

<table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" class="border-collapse ee_responsive_campaign" ee-template-version="2.4" ee-show-font-styles="" style="border-collapse: collapse;text-align: center;background-color: rgb(255, 255, 255);table-layout: auto" ee-mobile-first="true" bgcolor="rgb(255, 255, 255)">
	<tbody>
	<tr>
		<td valign="top" style="font-family: Arial, sans-serif;text-align: center">
			<center class="width-100" style="width: 100%">

				<!--  FULL WIDTH CONTENT: START  -->
				<!-- EMAIL BODY : START -->
				<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" class="email-body" style="min-width: 100%;text-align: center;background-color: rgb(255, 255, 255);table-layout: auto" bgcolor="rgb(255, 255, 255)">
					<tbody>
					<tr>
						<td class="email-full-width margin-0-auto" style="font-family: Arial, sans-serif;margin: 0 auto;width: 100%;text-align: center"><!--[if (gte mso 9)|(IE)]>
							<table cellspacing="0" cellpadding="0" border="0" style="width:660px;" width="660" align="center">
								<tr>
									<td>
							<![endif]-->

							<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" class="email-width" style="max-width: 660px;text-align: center;table-layout: auto">
								<tbody>
								<tr>
									<td style="font-family: Arial, sans-serif;text-align: center"><!-- ROW CONTAINER : BEGIN -->

										<table cellpadding="0" cellspacing="0" border="0" valign="top" width="100%" style="text-align: center;table-layout: auto;">
											<tbody>
											<tr>
												<td class="row-container" style="font-family: Arial, sans-serif;padding: 0;text-align: center;height: 100%;vertical-align: top;width: 100%"><!--[if mso]>
													<table border="0" cellspacing="0" cellpadding="0" align="center" style="width:660px;" width="660">
														<tr>
															<td align="center" valign="top" style="width:660px;" width="660">
													<![endif]-->
													<!-- ROWS : START -->

													<div class="ee_dropzone" style="text-align: center;">
														<!--
														<table cellpadding="0" cellspacing="0" class="col-font-reset ee_element ee_textelement" width="100%" ee-type="element" data-title="Text" style="font-size: 14px;text-align: left;min-width: 100%;table-layout: auto">
														<tbody>
														<tr>
														<td valign="top" align="left" class="element-pad element-bord root-element-pad" style="font-family: Arial, sans-serif;padding: 10px 20px;border-width: 0">
														<div class="ee_editable" style="color: #333333;font-size: 14px;line-height: 22px">
														<p style="word-wrap: break-word;word-break: break-word;Margin: 0px;color: rgb(0, 0, 0);font-size: 10px;line-height: 16px">
														<a target="_blank" href="' . get_site_url() . '/apply/history/" style="word-wrap: break-word;word-break: break-word;color: rgb(0, 0, 0);text-decoration: none">
														  <b>Открыть в браузере</b>
														</a>
														</p>
														</div>
														</td>
														</tr>
														</tbody>
														</table>
														-->
														<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" class="row three-cols ee_columns ee_element" ee-type="container" data-title="3 columns" style="max-width: 660px;min-width: 100%;position: relative;text-align: center;table-layout: auto">
															<tbody>
															<tr>
																<td align="center" valign="top" class="row-inner f-size-0 element-pad" dir="ltr" style="font-family: Arial, sans-serif;font-size: 0;padding: 0 10px;border-width: 0;padding-top: 10px;padding-right: 10px;padding-bottom: 20px;padding-left: 10px;text-align: center"><!--[if mso]>
																	<table border="0" cellspacing="0" cellpadding="0" align="center" style="width:640.0000610351562px;" width="640.0000610351562" class="mso-table-width">
																		<tr>
																			<td align="left" valign="top" style="width:255.98959350585938px;" width="255.98959350585938" class="mso-column-width"><![endif]--><!-- STACK COLUMN : BEGIN -->
																	<div class="stack-column stack-column-width" ee-percent-width="40" style="width: 40%;display: inline-block;vertical-align: top;max-width: 40%;min-width: 100%;text-align: center">
																		<table cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align: center;table-layout: auto;">
																			<tbody>
																			<tr>
																				<td dir="ltr" class="col-inner ee_dropzone" align="left" style="font-family: Arial, sans-serif;border-width: 0;padding: 0;text-align: center">
																					<table width="100%" border="0" cellpadding="0" cellspacing="0" class="col-font-reset ee_element ee_imageelement" ee-type="element" data-title="Image" style="font-size: 14px;text-align: center;min-width: 100%;table-layout: auto">
																						<tbody>
																						<tr>
																							<td align="left" class="element-pad element-bord" style="font-family: Arial, sans-serif;padding: 10px;border-width: 0;text-align: center">
																								<center class="ved_ctr"><a href="' . get_site_url() . '" target="_blank"><img src="' . get_site_url() . '/wp-content/uploads/2018/08/hays-logo.gif" style="color: #333333;font-size: 14px;line-height: 22px;width: 236px;min-height: auto;display: inline-block;margin-left: 0px;margin-right: 0px;margin-top: 0px;vertical-align: bottom;height: auto" class="ee_editable ee_noresponsiveresize ee_pnggif_image vedpw236" width="236" border="0"></a></center>
																							</td>
																						</tr>
																						</tbody>
																					</table>
																				</td>
																			</tr>
																			</tbody>
																		</table>
																	</div>

																	<!-- STACK COLUMN : END --><!--[if mso]></td>
																	<td align="left" valign="top" style="width:255.98959350585938px;" width="255.98959350585938" class="column"><![endif]--><!-- STACK COLUMN : BEGIN -->
																	<div class="stack-column stack-column-width" ee-percent-width="40" style="width: 40%;display: inline-block;vertical-align: top;max-width: 40%;min-width: 100%;text-align: center">
																		<table cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align: center;table-layout: auto;">
																			<tbody>
																			<tr>
																				<td dir="ltr" class="col-inner ee_dropzone" align="left" style="font-family: Arial, sans-serif;border-width: 0;padding: 0;text-align: center">
																					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ee_element ee_spacer col-font-reset" ee-type="element" data-title="Spacer" style="font-size: 14px;text-align: center;min-width: 100%;table-layout: auto">
																						<tbody>
																						<tr>
																							<td style="font-family: Arial, sans-serif;font-size: 1px;line-height: 1px;text-align: center"><img src="https://i.emlfiles4.com/cmpimg/t/s.gif" style="display: block; width: 1px; height: 10px;" alt="" class="" border="0" height="10" width="1"></td>
																						</tr>
																						</tbody>
																					</table>
																				</td>
																			</tr>
																			</tbody>
																		</table>
																	</div><!-- STACK COLUMN : END --><!--[if mso]></td>
																	<td align="left" valign="top" style="width:127.98611450195312px;" width="127.98611450195312" class="column"><![endif]--><!-- STACK COLUMN : BEGIN -->
																	<div class="stack-column stack-column-width" ee-percent-width="19.96" style="width: 20%;display: inline-block;vertical-align: top;max-width: 20%;min-width: 100%;text-align: center">
																		<table cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align: center;table-layout: auto;">
																			<tbody>
																			<tr>
																				<td dir="ltr" class="col-inner ee_dropzone" align="left" style="font-family: Arial, sans-serif;border-width: 0;padding: 0;text-align: center"></td>
																			</tr>
																			</tbody>
																		</table>
																	</div>
																	<!-- STACK COLUMN : END --><!--[if mso]></td></tr></table><![endif]-->
																</td>
															</tr>
															</tbody>
														</table>

													</div>

													<!-- ROWS : END -->
													<!--[if mso]>
													</td>
													</tr>
													</table>
													<![endif]-->
												</td>
											</tr>
											</tbody>
										</table>

										<!-- ROW CONTAINER : END --></td>
								</tr>
								</tbody>
							</table>

							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]-->
						</td>
					</tr>
					</tbody>
				</table>
				<!-- EMAIL BODY: END -->

				<!-- EMAIL BODY : START -->
				<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" class="email-body" style="min-width: 100%;text-align: center;background-color: rgb(245, 245, 245);table-layout: auto" bgcolor="rgb(245, 245, 245)">
					<tbody>
					<tr>
						<td class="email-full-width margin-0-auto" style="font-family: Arial, sans-serif;margin: 0 auto;width: 100%;text-align: center"><!--[if (gte mso 9)|(IE)]>
							<table cellspacing="0" cellpadding="0" border="0" style="width:660px;" width="660" align="center">
								<tr>
									<td>
							<![endif]-->

							<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" class="email-width" style="max-width: 660px;text-align: center;table-layout: auto">
								<tbody>
								<tr>
									<td style="font-family: Arial, sans-serif;text-align: center"><!-- ROW CONTAINER : BEGIN -->

										<table cellpadding="0" cellspacing="0" border="0" valign="top" width="100%" style="text-align: center;table-layout: auto;">
											<tbody>
											<tr>
												<td class="row-container" style="font-family: Arial, sans-serif;padding: 0;text-align: center;height: 100%;vertical-align: top;width: 100%">
													<!--[if mso]>
													<table border="0" cellspacing="0" cellpadding="0" align="center" style="width:660px;" width="660">
														<tr>
															<td align="center" valign="top" style="width:660px;" width="660">
													<![endif]-->
													<!-- ROWS : START -->

													<div class="ee_dropzone" style="text-align: center;">

														<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ee_element ee_spacer col-font-reset" ee-type="element" style="font-size: 14px;text-align: center;min-width: 100%;table-layout: auto" data-title="Spacer">
															<tbody>
															<tr>
																<td style="font-family: Arial, sans-serif;font-size: 1px;line-height: 1px;text-align: center">
																	<img src="https://i.emlfiles4.com/cmpimg/t/s.gif" style="display: block; width: 1px; height: 20px;" alt="" class="" border="0" height="20" width="1">
																</td>
															</tr>
															</tbody>
														</table>

													</div>

													<!-- ROWS : END -->
													<!--[if mso]>
													</td>
													</tr>
													</table>
													<![endif]-->
												</td>
											</tr>
											</tbody>
										</table>

										<!-- ROW CONTAINER : END --></td>
								</tr>
								</tbody>
							</table>

							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]--></td>
					</tr>
					</tbody>
				</table>
				<!-- EMAIL BODY: END -->
				<!-- EMAIL BODY : START -->
				<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" class="email-body" style="min-width: 100%;text-align: center;background-color: rgb(255, 255, 255);table-layout: auto" bgcolor="rgb(255, 255, 255)">
					<tbody>
					<tr>
						<td class="email-full-width margin-0-auto" style="font-family: Arial, sans-serif;margin: 0 auto;width: 100%;text-align: center"><!--[if (gte mso 9)|(IE)]>
							<table cellspacing="0" cellpadding="0" border="0" style="width:660px;" width="660" align="center">
								<tr>
									<td>
							<![endif]-->

							<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" class="email-width" style="max-width: 660px;text-align: center;table-layout: auto">
								<tbody>
								<tr>
									<td style="font-family: Arial, sans-serif;text-align: center"><!-- ROW CONTAINER : BEGIN -->

										<table cellpadding="0" cellspacing="0" border="0" valign="top" width="100%" style="text-align: center;table-layout: auto;">
											<tbody>
											<tr>
												<td class="row-container" style="font-family: Arial, sans-serif;padding: 0;text-align: center;height: 100%;vertical-align: top;width: 100%">
													<!--[if mso]>
													<table border="0" cellspacing="0" cellpadding="0" align="center" style="width:660px;" width="660">
														<tr>
															<td align="center" valign="top" style="width:660px;" width="660">
													<![endif]-->
													<!-- ROWS : START -->

													<div class="ee_dropzone" style="text-align: center;">

														<table cellpadding="0" cellspacing="0" class="col-font-reset ee_element ee_textelement" width="100%" ee-type="element" style="font-size: 14px;text-align: center;min-width: 100%;table-layout: auto" data-title="Text">
															<tbody>
															<tr>
																<td valign="top" align="left" class="element-pad element-bord root-element-pad" style="font-family: Arial, sans-serif;padding: 10px 20px;border-width: 0;padding-top: 10px;padding-right: 20px;padding-bottom: 10px;padding-left: 20px;text-align: center">
																	<div class="ee_editable" style="color: #333333;font-size: 14px;line-height: 22px;position: static">
																		<p style="word-wrap: break-word;word-break: break-word;margin: 0px;text-align: left">

																			<a href="' . get_site_url() . '/search/"><font style="word-wrap: break-word;word-break: break-word;font-weight: bold;color: rgb(0, 159, 217)">Все вакансии</font></a>

																			<b>&nbsp; </b>

																			<a href="' . get_site_url() . '/blog/"><font style="word-wrap: break-word;word-break: break-word;color: rgb(0, 159, 217)"><b>Карьерные советы</b></font></a>

																		</p>
																	</div>
																</td>
															</tr>
															</tbody>
														</table>
													</div>

													<!-- ROWS : END -->
													<!--[if mso]>
													</td>
													</tr>
													</table>
													<![endif]--></td>
											</tr>
											</tbody>
										</table>

										<!-- ROW CONTAINER : END --></td>
								</tr>
								</tbody>
							</table>

							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]--></td>
					</tr>
					</tbody>
				</table>
				<!-- EMAIL BODY: END -->
				<!-- EMAIL BODY : START -->
				<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" class="email-body" style="min-width: 100%;text-align: center;background-color: rgb(245, 245, 245);table-layout: auto" bgcolor="rgb(245, 245, 245)">
					<tbody>
					<tr>
						<td class="email-full-width margin-0-auto" style="font-family: Arial, sans-serif;margin: 0 auto;width: 100%;text-align: center"><!--[if (gte mso 9)|(IE)]>
							<table cellspacing="0" cellpadding="0" border="0" style="width:660px;" width="660" align="center">
								<tr>
									<td>
							<![endif]-->

							<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" class="email-width" style="max-width: 660px;text-align: center;table-layout: auto">
								<tbody>
								<tr>
									<td style="font-family: Arial, sans-serif;text-align: center"><!-- ROW CONTAINER : BEGIN -->

										<table cellpadding="0" cellspacing="0" border="0" valign="top" width="100%" style="text-align: center;table-layout: auto;">
											<tbody>
											<tr>
												<td class="row-container" style="font-family: Arial, sans-serif;padding: 0;text-align: center;height: 100%;vertical-align: top;width: 100%"><!--[if mso]>
													<table border="0" cellspacing="0" cellpadding="0" align="center" style="width:660px;" width="660">
														<tr>
															<td align="center" valign="top" style="width:660px;" width="660">
													<![endif]-->
													<!-- ROWS : START -->

													<div class="ee_dropzone" style="text-align: center;">

														<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" class="row one-cols ee_columns ee_element" ee-type="container" data-title="1 column" style="max-width: 660px;min-width: 100%;position: relative;text-align: center;background-color: rgb(0, 39, 118);table-layout: auto" bgcolor="rgb(0, 39, 118)">
															<tbody>
															<tr>
																<td align="center" valign="top" class="row-inner f-size-0 element-pad" style="font-family: Arial, sans-serif;font-size: 0;padding: 0 10px;border-width: 0;padding-top: 20px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;text-align: center"><!--[if mso]>
																	<table border="0" cellspacing="0" cellpadding="0" align="center" style="width:640.0000610351562px;" width="640.0000610351562" class="mso-table-width">
																		<tr>
																			<td align="left" valign="top" style="width:640px;" width="640" class="mso-column-width"><![endif]--><!-- STACK COLUMN : BEGIN -->
																	<div class="stack-column stack-column-width" ee-percent-width="100" style="width: 100%;display: inline-block;vertical-align: top;min-width: 100%;max-width: 640px;text-align: center">
																		<table cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align: center;table-layout: auto;">
																			<tbody>
																			<tr>
																				<td dir="ltr" class="col-inner ee_dropzone" align="left" style="font-family: Arial, sans-serif;border-width: 0;padding: 0;text-align: center">
																					<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" class="row one-cols ee_columns ee_element" ee-type="container" data-title="1 column" style="max-width: 100%;min-width: 100%;position: relative;text-align: center;background-color: rgb(255, 255, 255);table-layout: auto" bgcolor="rgb(255, 255, 255)">
																						<tbody>
																						<tr>
																							<td align="center" valign="top" class="row-inner f-size-0 element-pad col-inner" style="font-family: Arial, sans-serif;font-size: 0;border-width: 0;padding: 0 0;padding-top: 10px;padding-right: 10px;padding-bottom: 10px;padding-left: 10px;text-align: center"><!--[if mso]>
																								<table border="0" cellspacing="0" cellpadding="0" align="center" style="width:620px;" width="620" class="mso-table-width">
																									<tr>
																										<td align="left" valign="top" style="width:620px;" width="620" class="mso-column-width"><![endif]--><!-- STACK COLUMN : BEGIN -->
																								<div class="stack-column stack-column-width" ee-percent-width="100" style="width: 100%;display: inline-block;vertical-align: top;min-width: 100%;max-width: 620px;text-align: center">
																									<table cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align: center;table-layout: auto;">
																										<tbody>
																										<tr>
																											<td dir="ltr" class="col-inner ee_dropzone" align="left" style="font-family: Arial, sans-serif;border-width: 0;padding: 0;text-align: center">
																												<table cellpadding="0" cellspacing="0" class="col-font-reset ee_element ee_textelement" width="100%" ee-type="element" data-title="Text" style="font-size: 14px;text-align: left;min-width: 100%;table-layout: auto">
																													<tbody>
																													<tr>
																														<td valign="top" align="left" class="element-pad element-bord" style="font-family: Arial, sans-serif;padding: 10px;border-width: 0">
																															<div class="ee_editable" style="color: #333333;font-size: 14px;line-height: 22px"><p style="word-wrap: break-word;word-break: break-word;margin: 0px;line-height: 20px;font-size: 20px"><b><font style="word-wrap: break-word;word-break: break-word;font-size: 20px" color="#002776">СПАСИБО ЗА ВАШЕ РЕЗЮМЕ</font><br></b></p></div>
																														</td>
																													</tr>
																													</tbody>
																												</table>
																												<table width="100%" border="0" cellpadding="0" cellspacing="0" class="col-font-reset ee_element ee_imageelement" ee-type="element" data-title="Image" style="font-size: 14px;text-align: left;min-width: 100%;table-layout: auto">
																													<tbody>
																													<tr>
																														<td align="left" class="element-pad element-bord" style="font-family: Arial, sans-serif;padding: 10px;border-width: 0;font-size: 1px;line-height: 1px"><img src="https://i.emlfiles4.com/cmpimg/8/3/9/4/0/2/files/276637_hays_1967398.png" alt="" style="color: #333333;font-size: 14px;line-height: 22px;width: 100%;height: auto;display: block" class="ee_editable vedpw600" width="600"></td>
																													</tr>
																													</tbody>
																												</table>
																												<table cellpadding="0" cellspacing="0" class="col-font-reset ee_element ee_textelement" width="100%" ee-type="element" data-title="Текст" style="font-size: 14px;text-align: left;min-width: 100%;table-layout: auto">
																													<tbody>
																													<tr>
																														<td valign="top" align="left" class="element-pad element-bord" style="font-family: Arial, sans-serif;padding: 10px;border-width: 0">
																															<div class="ee_editable" style="color: #333333;font-size: 14px;line-height: 22px"><p style="word-wrap: break-word;word-break: break-word;margin: 0px;font-family: arial, helvetica, sans-serif;font-size: 16px;line-height: 25px">Уважаемый соискатель!</p>
																																<p style="word-wrap: break-word;word-break: break-word;margin: 0px;font-family: arial, helvetica, sans-serif;font-size: 16px;line-height: 25px"><br></p>
																																<p style="word-wrap: break-word;word-break: break-word;margin: 0px;font-family: arial, helvetica, sans-serif;font-size: 16px;line-height: 25px">

																																	Ваш отклик на позицию <a href="' . get_permalink( $_POST[" job_id"] ) . '"><b>' . $_POST['job_title'] . '</b></a> был направлен одному из Консультантов Hays.

																																</p>
																																<p style="word-wrap: break-word;word-break: break-word;margin: 0px;font-family: arial, helvetica, sans-serif;font-size: 16px;line-height: 25px"><br></p>
																																<p style="word-wrap: break-word;word-break: break-word;Margin: 0px;line-height: 22px"></p>
																																<p style="word-wrap: break-word;word-break: break-word;margin: 0px;font-family: arial, helvetica, sans-serif;font-size: 16px;line-height: 25px">Если Ваши навыки и опыт окажутся релевантными требованиям данной вакансии, мы обязательно свяжемся с Вами в ближайшее время.</p>
																																<p style="word-wrap: break-word;word-break: break-word;margin: 0px;font-family: arial, helvetica, sans-serif;font-size: 16px;line-height: 25px"><br></p>
																																<p style="word-wrap: break-word;word-break: break-word;margin: 0cm -15.1pt 0.0001pt 0cm;color: rgb(0, 0, 0);font-family: arial, helvetica, sans-serif;font-size: 16px;line-height: 25px">Посмотрите вакансии, которые могут Вас также заинтересовать:</p>
																																<p style="word-wrap: break-word;word-break: break-word;margin: 0cm -15.1pt 0.0001pt 0cm;color: rgb(0, 0, 0);font-family: arial, helvetica, sans-serif;font-size: 16px;line-height: 25px"><br></p>
																																<ul style="margin-top: 0px; margin-bottom: 0px;">
																																	' . $simularVacancies . '
																																</ul>
																																<p style="word-wrap: break-word;word-break: break-word;Margin: 0px"></p>

																															</div>
																														</td>
																													</tr>
																													</tbody>
																												</table>
																											</td>
																										</tr>
																										</tbody>
																									</table>
																								</div>
																								<!-- STACK COLUMN : END --><!--[if mso]></td></tr></table><![endif]-->
																							</td>
																						</tr>
																						</tbody>
																					</table>
																					<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" class="row two-cols ee_columns ee_element" ee-type="container" data-title="2 columns" style="max-width: 100%;min-width: 100%;position: relative;text-align: center;background-color: rgb(245, 245, 245);table-layout: auto" bgcolor="rgb(245, 245, 245)">
																						<tbody>
																						<tr>
																							<td align="center" valign="top" class="row-inner f-size-0 element-pad col-inner" dir="ltr" style="font-family: Arial, sans-serif;font-size: 0;border-width: 0;padding: 0 0;padding-top: 15px;padding-right: 10px;padding-bottom: 15px;padding-left: 10px;text-align: center"><!--[if mso]>
																								<table border="0" cellspacing="0" cellpadding="0" align="center" style="width:620px;" width="620" class="mso-table-width">
																									<tr>
																										<td align="left" valign="top" style="width:471.9270935058594px;" width="471.9270935058594" class="mso-column-width"><![endif]--><!-- STACK COLUMN : BEGIN -->
																								<div class="stack-column stack-column-width" ee-percent-width="76" style="width: 76.12%;display: inline-block;vertical-align: top;max-width: 76.12%;min-width: 100%;text-align: center">
																									<table cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align: center;table-layout: auto;">
																										<tbody>
																										<tr>
																											<td dir="ltr" class="col-inner ee_dropzone" align="left" style="font-family: Arial, sans-serif;border-width: 0;padding: 0;text-align: center">
																												<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ee_element ee_spacer col-font-reset" ee-type="element" data-title="Spacer" style="font-size: 14px;text-align: left;min-width: 100%;table-layout: auto">
																													<tbody>
																													<tr>
																														<td style="font-family: Arial, sans-serif;font-size: 1px;line-height: 1px"><img src="https://i.emlfiles4.com/cmpimg/t/s.gif" style="display: block; width: 1px; height: 10px;" alt="" class="" border="0" height="10" width="1"></td>
																													</tr>
																													</tbody>
																												</table>
																												<table cellpadding="0" cellspacing="0" class="col-font-reset ee_element ee_textelement" width="100%" ee-type="element" data-title="Text" style="font-size: 14px;text-align: left;min-width: 100%;table-layout: auto">
																													<tbody>
																													<tr>
																														<td valign="top" align="left" class="element-pad element-bord" style="font-family: Arial, sans-serif;padding: 10px;border-width: 0">
																															<div class="ee_editable" style="color: #333333;font-size: 14px;line-height: 22px;position: static"><p style="word-wrap: break-word;word-break: break-word;Margin: 0px;line-height: 22px;color: rgb(0, 0, 0)"><font style="word-wrap: break-word;word-break: break-word;font-size: 16px">Давайте дружить в социальных сетях:</font></p></div>
																														</td>
																													</tr>
																													</tbody>
																												</table>
																											</td>
																										</tr>
																										</tbody>
																									</table>
																								</div><!-- STACK COLUMN : END --><!--[if mso]></td>
																								<td align="left" valign="top" style="width:147.98611450195312px;" width="147.98611450195312" class="column"><![endif]--><!-- STACK COLUMN : BEGIN -->
																								<div class="stack-column stack-column-width" ee-percent-width="23.84" style="width: 23.87%;display: inline-block;vertical-align: top;max-width: 23.87%;min-width: 100%;text-align: center">
																									<table cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align: center;table-layout: auto;">
																										<tbody>
																										<tr>
																											<td dir="ltr" class="col-inner ee_dropzone" align="left" style="font-family: Arial, sans-serif;border-width: 0;padding: 0;text-align: center">
																												<table cellpadding="0" cellspacing="0" width="100%" class="ee_customedit ee_sociallinks ee-addwidth ee_element" ee-type="container" data-title="Social links" style="min-width: 100%;table-layout: auto">
																													<tbody>
																													<tr>
																														<td valign="top" class="ee_sociallinkscontent element-pad element-bord" style="font-family: Arial, sans-serif;padding: 10px;border-width: 0">
																															<div class="eesociallinks">
																																<table cellpadding="0" cellspacing="0" align="left" class="align-left" style="table-layout: auto;">
																																	<tbody>
																																	<tr>
																																		<td style="font-family: Arial, sans-serif;text-align: center;padding-top: 0px;padding-right: 3px;padding-bottom: 3px;padding-left: 0px">

																																			<a target="_blank" href="' . get_field( 'link_fb', 'option' ) . '">
																																				<img src="' . get_site_url() . '/wp-content/themes/hays-careers/img/fb-icon.png" border="0" height="32" title="Facebook" style="font-family: Arial, sans-serif; color: rgb(0, 0, 0); font-size: 12px; padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px; width: 32px; height: 32px;">
																																			</a>

																																		</td>
																																		<td style="font-family: Arial, sans-serif;text-align: center;padding-top: 0px;padding-right: 3px;padding-bottom: 3px;padding-left: 0px">

																																			<a target="_blank" href="' . get_field( 'link_in', 'option' ) . '">
																																				<img src="' . get_site_url() . '/wp-content/themes/hays-careers/img/in-icon.png" border="0" height="32" title="LinkedIn" style="font-family: Arial, sans-serif; color: rgb(0, 0, 0); font-size: 12px; padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px; width: 32px; height: 32px;">
																																			</a>

																																		</td>
																																		<td style="font-family: Arial, sans-serif;text-align: center;padding-top: 0px;padding-right: 3px;padding-bottom: 3px;padding-left: 0px">

																																			<a target="_blank" href="' . get_field( 'link_inst', 'option' ) . '">
																																				<img src="' . get_site_url() . '/wp-content/themes/hays-careers/img/inst-icon.png" border="0" height="32" title="Instagram" style="font-family: Arial, sans-serif; color: rgb(0, 0, 0); font-size: 12px; padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px; width: 32px; height: 32px;">
																																			</a>

																																		</td>
																																		<td style="font-family: Arial, sans-serif;text-align: center;padding-top: 0px;padding-right: 3px;padding-bottom: 3px;padding-left: 0px">

																																			<a target="_blank" href="' . get_field( 'link_yt', 'option' ) . '">
																																				<img src="' . get_site_url() . '/wp-content/themes/hays-careers/img/yt-icon.png" border="0" height="32" title="YouTube" style="font-family: Arial, sans-serif; color: rgb(0, 0, 0); font-size: 12px; padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px; width: 32px; height: 32px;">
																																			</a>

																																		</td>
																																	</tr>
																																	</tbody>
																																</table>
																															</div>
																														</td>
																													</tr>
																													</tbody>
																												</table>
																											</td>
																										</tr>
																										</tbody>
																									</table>
																								</div><!-- STACK COLUMN : END --><!--[if mso]></td></tr></table><![endif]--></td>
																						</tr>
																						</tbody>
																					</table>
																				</td>
																			</tr>
																			</tbody>
																		</table>
																	</div><!-- STACK COLUMN : END --><!--[if mso]></td></tr></table><![endif]--></td>
															</tr>
															</tbody>
														</table>

														<table width="100%" border="0" cellspacing="0" cellpadding="0" class="ee_element ee_spacer col-font-reset" ee-type="element" data-title="Spacer" style="font-size: 14px;text-align: center;min-width: 100%;table-layout: auto">
															<tbody>
															<tr>
																<td style="font-family: Arial, sans-serif;font-size: 1px;line-height: 1px;text-align: center">
																	<img src="https://i.emlfiles4.com/cmpimg/t/s.gif" style="display: block; width: 1px; height: 10px;" alt="" class="" border="0" height="10" width="1"></td>
															</tr>
															</tbody>
														</table>

													</div>
													<!-- ROWS : END -->
													<!--[if mso]>
													</td>
													</tr>
													</table>
													<![endif]--></td>
											</tr>
											</tbody>
										</table>

										<!-- ROW CONTAINER : END --></td>
								</tr>
								</tbody>
							</table>

							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]--></td>
					</tr>
					</tbody>
				</table>
				<!-- EMAIL BODY: END -->
				<!-- EMAIL BODY : START -->
				<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" class="email-body" style="min-width: 100%;text-align: center;background-color: rgb(255, 255, 255);table-layout: auto" bgcolor="rgb(255, 255, 255)">
					<tbody>
					<tr>
						<td class="email-full-width margin-0-auto" style="font-family: Arial, sans-serif;margin: 0 auto;width: 100%;text-align: center"><!--[if (gte mso 9)|(IE)]>
							<table cellspacing="0" cellpadding="0" border="0" style="width:660px;" width="660" align="center">
								<tr>
									<td>
							<![endif]-->

							<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" class="email-width" style="max-width: 660px;text-align: center;table-layout: auto">
								<tbody>
								<tr>
									<td style="font-family: Arial, sans-serif;text-align: center"><!-- ROW CONTAINER : BEGIN -->

										<table cellpadding="0" cellspacing="0" border="0" valign="top" width="100%" style="text-align: center;table-layout: auto;">
											<tbody>
											<tr>
												<td class="row-container" style="font-family: Arial, sans-serif;padding: 0;text-align: center;height: 100%;vertical-align: top;width: 100%"><!--[if mso]>
													<table border="0" cellspacing="0" cellpadding="0" align="center" style="width:660px;" width="660">
														<tr>
															<td align="center" valign="top" style="width:660px;" width="660">
													<![endif]-->
													<!-- ROWS : START -->

													<div class="ee_dropzone" style="text-align: center;">

														<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" class="row two-cols ee_columns ee_element" ee-type="container" data-title="2 columns" style="max-width: 660px;min-width: 100%;position: relative;text-align: center;table-layout: auto">
															<tbody>
															<tr>
																<td align="center" valign="top" class="row-inner f-size-0 element-pad" dir="ltr" style="font-family: Arial, sans-serif;font-size: 0;padding: 0 10px;border-width: 0;padding-top: 15px;padding-right: 10px;padding-bottom: 15px;padding-left: 10px;text-align: center"><!--[if mso]>
																	<table border="0" cellspacing="0" cellpadding="0" align="center" style="width:640.0000610351562px;" width="640.0000610351562" class="mso-table-width">
																		<tr>
																			<td align="left" valign="top" style="width:377.4653015136719px;" width="377.4653015136719" class="mso-column-width"><![endif]--><!-- STACK COLUMN : BEGIN -->
																	<div class="stack-column stack-column-width" ee-percent-width="59" style="width: 58.98%;display: inline-block;vertical-align: top;max-width: 58.98%;min-width: 100%;text-align: center">
																		<table cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align: center;table-layout: auto;">
																			<tbody>
																			<tr>
																				<td dir="ltr" class="col-inner ee_dropzone" align="left" style="font-family: Arial, sans-serif;border-width: 0;padding: 0;text-align: center">
																					<table cellpadding="0" cellspacing="0" class="col-font-reset ee_element ee_textelement" width="100%" ee-type="element" data-title="Text" style="font-size: 14px;text-align: center;min-width: 100%;table-layout: auto">
																						<tbody>
																						<tr>
																							<td valign="top" align="left" class="element-pad element-bord" style="font-family: Arial, sans-serif;padding: 10px;border-width: 0;text-align: center">
																								<div class="ee_editable" style="color: #333333;font-size: 14px;line-height: 22px"><p style="word-wrap: break-word;word-break: break-word;margin: 0px;text-align: left"><font style="word-wrap: break-word;word-break: break-word;color: rgb(0, 0, 0);font-family: arial, helvetica, sans-serif;font-size: 13px;line-height: normal">C уважением,</font></p>
																									<p style="word-wrap: break-word;word-break: break-word;margin: 0px;text-align: left"><font style="word-wrap: break-word;word-break: break-word;color: rgb(0, 0, 0);font-family: arial, helvetica, sans-serif;font-size: 13px;line-height: normal">Команда Hays</font></p>
																									<p style="word-wrap: break-word;word-break: break-word;margin: 0px;font-family: arial, helvetica, sans-serif;font-size: 13px;text-align: left"><font style="word-wrap: break-word;word-break: break-word;color: rgb(0, 0, 0);font-family: arial, helvetica, sans-serif;font-size: 13px;line-height: normal"><br></font></p>
																									<p style="word-wrap: break-word;word-break: break-word;margin: 0px;text-align: left"><font style="word-wrap: break-word;word-break: break-word;font-size: 13px"><b>HAYS Recruiting experts worldwide &nbsp;</b></font></p></div>
																							</td>
																						</tr>
																						</tbody>
																					</table>
																					<table cellpadding="0" cellspacing="0" class="col-font-reset ee_element ee_textelement" width="100%" ee-type="element" data-title="Text" style="font-size: 14px;text-align: center;min-width: 100%;table-layout: auto">
																						<tbody>
																						<tr>
																							<td valign="top" align="left" class="element-pad element-bord" style="font-family: Arial, sans-serif;padding: 10px;border-width: 0;padding-top: 0px;padding-right: 10px;padding-bottom: 0px;padding-left: 10px;text-align: center">
																								<div class="ee_editable" style="color: #333333;font-size: 14px;line-height: 22px"><p style="word-wrap: break-word;word-break: break-word;Margin: 0px;text-align: left"><span style="font-size: 13px;">Это автоматическое письмо, пожалуйста, не отвечаейте на него.</span></p>
																									<p style="word-wrap: break-word;word-break: break-word;Margin: 0px;text-align: left"><font style="word-wrap: break-word;word-break: break-word;font-size: 13px"><b><font color="#009fd9" style="word-wrap: break-word;word-break: break-word"></font></b></font></p></div>
																							</td>
																						</tr>
																						</tbody>
																					</table>
																				</td>
																			</tr>
																			</tbody>
																		</table>
																	</div><!-- STACK COLUMN : END --><!--[if mso]></td>
																	<td align="left" valign="top" style="width:262.326416015625px;" width="262.326416015625" class="column"><![endif]--><!-- STACK COLUMN : BEGIN -->
																	<div class="stack-column stack-column-width" ee-percent-width="40.97" style="width: 40.99%;display: inline-block;vertical-align: top;max-width: 40.99%;min-width: 100%;text-align: center">
																		<table cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align: center;table-layout: auto;">
																			<tbody>
																			<tr>
																				<td dir="ltr" class="col-inner ee_dropzone" align="left" style="font-family: Arial, sans-serif;border-width: 0;padding: 0;text-align: center">
																					<div class="ee-show-on-desktop" style="display: none"><!--[if mso]>
																						<table cellpadding="0" cellspacing="0" width="100%">
																							<tr>
																								<td><![endif]-->
																						<table width="100%" border="0" cellpadding="0" cellspacing="0" class="col-font-reset ee_element ee_imageelement" ee-type="element" data-title="Image" style="font-size: 14px;text-align: center;min-width: 100%;table-layout: auto">
																							<tbody>
																							<tr>
																								<td align="left" class="element-pad element-bord" style="font-family: Arial, sans-serif;padding: 10px;border-width: 0;text-align: center">
																									<center class="ved_ctr"><img src="' . get_site_url() . '/wp-content/themes/hays-careers/img/hays-email-footer-logo.jpg" style="color: #333333;font-size: 14px;line-height: 22px;width: 75.9259%;min-height: auto;display: inline-block;margin-left: 0px;margin-right: 0px;margin-top: 0px;vertical-align: bottom;height: auto" class="ee_editable vedpw242" width="184" border="0"></center>
																								</td>
																							</tr>
																							</tbody>
																						</table>
																						<!--[if mso]></td></tr></table><![endif]-->

																					</div>
																				</td>
																			</tr>
																			</tbody>
																		</table>
																	</div>
																	<!-- STACK COLUMN : END -->
																	<!--[if mso]></td></tr></table><![endif]--></td>
															</tr>
															</tbody>
														</table>
													</div>

													<!-- ROWS : END -->
													<!--[if mso]>
													</td>
													</tr>
													</table>
													<![endif]--></td>
											</tr>
											</tbody>
										</table>

										<!-- ROW CONTAINER : END --></td>
								</tr>
								</tbody>
							</table>

							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]--></td>
					</tr>
					</tbody>
				</table>
				<!-- EMAIL BODY: END -->
				<!-- EMAIL BODY : START -->
				<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" class="email-body" style="min-width: 100%;text-align: center;background-color: rgb(245, 245, 245);table-layout: auto" bgcolor="rgb(245, 245, 245)">
					<tbody>
					<tr>
						<td class="email-full-width margin-0-auto" style="font-family: Arial, sans-serif;margin: 0 auto;width: 100%;text-align: center"><!--[if (gte mso 9)|(IE)]>
							<table cellspacing="0" cellpadding="0" border="0" style="width:660px;" width="660" align="center">
								<tr>
									<td>
							<![endif]-->

							<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" class="email-width" style="max-width: 660px;text-align: center;table-layout: auto">
								<tbody>
								<tr>
									<td style="font-family: Arial, sans-serif;text-align: center"><!-- ROW CONTAINER : BEGIN -->

										<table cellpadding="0" cellspacing="0" border="0" valign="top" width="100%" style="text-align: center;table-layout: auto;">
											<tbody>
											<tr>
												<td class="row-container" style="font-family: Arial, sans-serif;padding: 0;text-align: center;height: 100%;vertical-align: top;width: 100%"><!--[if mso]>
													<table border="0" cellspacing="0" cellpadding="0" align="center" style="width:660px;" width="660">
														<tr>
															<td align="center" valign="top" style="width:660px;" width="660">
													<![endif]-->
													<!-- ROWS : START -->

													<div class="ee_dropzone" style="text-align: center;">
														<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" class="row one-cols ee_columns ee_element" ee-type="container" data-title="1 column" style="max-width: 660px;min-width: 100%;position: relative;text-align: center;table-layout: auto">
															<tbody>
															<tr>
																<td align="center" valign="top" class="row-inner f-size-0 element-pad" style="font-family: Arial, sans-serif;font-size: 0;padding: 0 10px;border-width: 0;padding-top: 15px;padding-right: 10px;padding-bottom: 40px;padding-left: 10px;text-align: center"><!--[if mso]>
																	<table border="0" cellspacing="0" cellpadding="0" align="center" style="width:640.0000610351562px;" width="640.0000610351562" class="mso-table-width">
																		<tr>
																			<td align="left" valign="top" style="width:640px;" width="640" class="mso-column-width">
																	<![endif]-->
																	<!-- STACK COLUMN : BEGIN -->
																	<div class="stack-column stack-column-width" ee-percent-width="100" style="width: 100%;display: inline-block;vertical-align: top;min-width: 100%;max-width: 640px;text-align: center">
																		<table cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align: center;table-layout: auto;">
																			<tbody>
																			<tr>
																				<td dir="ltr" class="col-inner ee_dropzone" align="left" style="font-family: Arial, sans-serif;border-width: 0;padding: 0;text-align: center">

																					<table cellpadding="0" cellspacing="0" class="col-font-reset ee_element ee_textelement" width="100%" ee-type="element" data-title="Text" style="font-size: 14px;text-align: center;min-width: 100%;table-layout: auto">
																						<tbody>
																						<tr>
																							<td valign="top" align="left" class="element-pad element-bord" style="font-family: Arial, sans-serif;padding: 10px;border-width: 0;text-align: center">
																								<div class="ee_editable" style="color: #333333;font-size: 14px;line-height: 22px"><p style="word-wrap: break-word;word-break: break-word;Margin: 0px;color: rgb(148, 148, 148);line-height: 21px;text-align: center">
																										<b>
																											<font style="word-wrap: break-word;word-break: break-word;font-size: 10px">© Hays plc 2018. HAYS, RECRUITING EXPERTS WORLDWIDE и символ H являются торговой маркой Hays plc.&nbsp;</font>
																										</b>
																									</p>
																									<p style="word-wrap: break-word;word-break: break-word;Margin: 0px;color: rgb(148, 148, 148);font-size: 10px;line-height: 15px;text-align: center">
																										<b>Регистрационный адрес компании: ' . get_field( 'apply_reg_address', 'option' ) . '</b>
																									</p>
																									<p style="word-wrap: break-word;word-break: break-word;Margin: 0px;color: rgb(148, 148, 148);line-height: 21px;text-align: center">
																										<b>
																											<font style="word-wrap: break-word;word-break: break-word;font-size: 10px">Номер компании: ' . get_field( 'apply_num_comp', 'option' ) . '</font>
																										</b>
																									</p>
																									<p style="word-wrap: break-word;word-break: break-word;Margin: 0px;font-size: 8px;color: rgb(148, 148, 148);text-align: center">
																										<b></b>
																									</p>
																								</div>
																							</td>
																						</tr>
																						</tbody>
																					</table>
																				</td>
																			</tr>
																			</tbody>
																		</table>
																	</div>
																	<!-- STACK COLUMN : END -->
																	<!--[if mso]>
																	</td>
																	</tr>
																	</table>
																	<![endif]-->
																</td>
															</tr>
															</tbody>
														</table>

													</div>

													<!-- ROWS : END -->
													<!--[if mso]>
													</td>
													</tr>
													</table>
													<![endif]--></td>
											</tr>
											</tbody>
										</table>

										<!-- ROW CONTAINER : END --></td>
								</tr>
								</tbody>
							</table>

							<!--[if (gte mso 9)|(IE)]>
							</td>
							</tr>
							</table>
							<![endif]--></td>
					</tr>
					</tbody>
				</table>
				<!-- EMAIL BODY: END -->

				<!--  FULL WIDTH CONTENT: END -->

			</center>
		</td>
	</tr>
	</tbody>
</table>
</body>
</html>';