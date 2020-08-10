<?php

// สร้าง object สำหรับใช้สร้าง pdf 
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
         
        // กำหนดรายละเอียดของ pdf
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('CMU Tutor');
        $pdf->SetTitle('ใบแสดงรายละเอียดรายรับ');
        $pdf->SetSubject('รายละรายรับ');
        $pdf->SetKeywords('CMU, นวด, ช้างแดง, นวดโบราณ, นวดเชียงใหม่, นวดแผนไทย,ช้างแดงโพธิเวชนวดแผนโบราณเชียงใหม่');
         
        // กำหนดข้อมูลที่จะแสดงในส่วนของ header และ footer
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));
         
        // กำหนดรูปแบบของฟอนท์และขนาดฟอนท์ที่ใช้ใน header และ footer
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
         
        // กำหนดค่าเริ่มต้นของฟอนท์แบบ monospaced 
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
         
        // กำหนด margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
         
        // กำหนดการแบ่งหน้าอัตโนมัติ
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
         
        // กำหนดรูปแบบการปรับขนาดของรูปภาพ 
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
         
        // ---------------------------------------------------------
         
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);
         
        // กำหนดฟอนท์ 
        // ฟอนท์ freeserif รองรับภาษาไทย
        $pdf->SetFont('THSarabunNew', '', 16, '', true);
         
         
         
        // เพิ่มหน้า pdf
        // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
        $pdf->AddPage();
         
        // กำหนดเงาของข้อความ 
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
 
// กำหนดเนื้อหาข้อมูลที่จะสร้าง pdf ในที่นี้เราจะกำหนดเป็นแบบ html โปรดระวัง EOD; โค้ดสุดท้ายต้องชิดซ้ายไม่เว้นวรรค
    $pdf->Ln(1);
    $heading = <<<EOD
            <h3 style="color:#0a3d62"><b>ใบเสร็จ</b></h3>
EOD;
    // $data_table = 'ชื่อ'.'&nbsp;'.$student[0]->firstname.'&nbsp;&nbsp;'.$student[0]->lastname.'&nbsp;&nbsp;'.$student[0]->tel1;
    // สร้างข้อเนื้อหา pdf ด้วยคำสั่ง writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $heading, 0, 1, 0, true, 'C', true);
    $pdf->Ln(5);
    $time_print = date('d-m-Y');
    $top_table = '
            <table cellspacing="5" cellpadding="1" border="0">
                <tr>
                    <td align="right" colspan="9">เลขที่ใบเสร็จ</td>   
                    <td align="right">'.$id.'</td>
                </tr>
                <tr>
                    <td align="right" colspan="7"></td> 
                    <td align="right" colspan="3">'.datethai(date("d M Y", strtotime($time_print))).'&nbsp;'.date('H:i:s').'</td>   
                </tr>
            </table>';
    $pdf->writeHTML($top_table2, true, false, false, false, '');
    $pdf->writeHTML($top_table, true, false, false, false, '');
    
    // $pdf->Ln();
    $data_table = '<table cellspacing="0" cellpadding="5" border="1">';
    $data_table .= '<tr>
                        <th align="center" >รายละเอียด</th>
                        <th align="center">เวลารับบริการ(ชั่วโมง)</th>
                        <th align="center">ราคา(บาท)</th>
                    </tr>';
    $total_income = 0;
    $count = 1;
    foreach ($course as $value) {
        $data_table .= '<tr>
                            <td align="left">'.$value["course"].'</td>
                            <td align="right">'.$value["hours"].'</td>
                            <td align="right">'.$value["prices"].'</td>
                        </tr>';
    }
    $data_table .= '</table>';
    $data_table2 = '<table cellspacing="1" cellpadding="5" >';
    foreach ($receipt as $value) {  
        $data_table2 .= '
                        <tr>
                            <td align="right" colspan="4"></td> 
                            <td align="right">จำนวน</td>  
                            <td align="right">'.$value["amount"].'</td>   
                            <td align="right">คน</td>
                        </tr>
                        <tr>
                            <td align="right" colspan="4"></td> 
                            <td align="right">รวมราคา</td>  
                            <td align="right">'.$value["totalPrice"].'</td>   
                            <td align="right">บาท</td>
                        </tr>
                        <tr>
                            <td align="right" colspan="4"></td> 
                            <td align="right">ส่วนลด</td>
                            <td align="right">'.$value["discount"].'</td>
                            <td align="right">บาท</td>
                        </tr>
                        <tr>
                            <td align="right" colspan="4"></td> 
                            <td align="right">VAT</td>
                            <td align="right">'.$value["vat"].'</td>
                            <td align="right">บาท</td>
                        </tr>
                        <tr>
                            <td align="right" colspan="4"></td>
                            <td align="right">ยอดชำระ</td>
                            <td align="right">'.$value["payment"].'</td>
                            <td align="right">บาท</td>
                        </tr>';
    }
    $data_table2 .= '</table>';
    if(!empty($receipt)){
        $pdf->writeHTML($data_table, true, false, false, false, '');
        $pdf->writeHTML($data_table2, true, false, false, false, '');
        $pdf->Ln(1);
        // $total_price = '<p style="color:#c0392b;"><b>รายรับรวม&nbsp;&nbsp;'.number_format($total_income,2).'&nbsp;&nbsp;บาท</b></p>';
        // $pdf->writeHTMLCell(0, 0, '', '', $total_price, 0, 1, 0, true, 'R', true);
        $pdf->Ln(8);
    }else{
        $pdf->Ln(8);
        $null_data = '<p style="color:#c0392b;"><b>ไม่มีข้อมูล</b></p>';
        $pdf->writeHTMLCell(0, 0, '', '', $null_data, 0, 1, 0, true, 'C', true);
        $pdf->Ln(15);
    }
    $data_footer = 'ช้างแดงโพธิเวช นวดแผนโบราณ เชียงใหม่';
    $pdf->writeHTMLCell(0, 0, '', '', $data_footer, 0, 1, 0, true, 'C', true);
    $data_footer = '90 ถ.ศรีดอนไชย ต.ช้างเผือก อ.เมืองเชียงใหม่ 50100 โทร 053-235-107';
    $pdf->writeHTMLCell(0, 0, '', '', $data_footer, 0, 1, 0, true, 'C', true);

    
// ---------------------------------------------------------
 
    // จบการทำงานและแสดงไฟล์ pdf
    // การกำหนดในส่วนนี้ สามารถปรับรูปแบบต่างๆ ได้ เช่นให้บันทึกเป้นไฟล์ หรือให้แสดง pdf เลย ดูวิธีใช้งานที่คู่มือของ tcpdf เพิ่มเติม
    ob_clean();
    $pdf->Output('ใบแสดงค่าลงทะเบียน.pdf', 'I');
    end_ob_clean();