<div class="container">
    <div class="row">
        <div class="col-12 report-title">
            แบบฟอร์มข้อเสนอโครงการฉบับสมบูรณ์ (Full Proposal)<br />
            ประกอบการเสนอของบประมาณ ด้านวิทยาศาสตร์ วิจัย และนวัตกรรม<br />
            ประเภท : โครงการวิจัย
        </div>
    </div>

    <div class="row">
        <div class="col-12 title">ความสอดคล้องของข้อเสนอโครงการชี้วัดเป้าหมาย (KR) ของยุทธศาสตร์หน่วยงาน</div>
    </div>
    <div class="row">
        <div class="col-3">เป้าประสงค์ (Objectives)</div>
        <div class="col-9 detail">{{ $form->pd_tsri_objectives ? $form->pd_tsri_objectives : '' }}</div>
    </div>
    <div class="row">
        <div class="col-3">ตัวชี้วัดเป้าหมาย (KR)</div>
        <div class="col-9 detail">{{ $form->pd_tsri_kr ? $form->pd_tsri_kr : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">ความสอดคล้องของข้อเสนอโครงการวิจัยด้าน ววน.</div>
    </div>
    <div class="row">
        <div class="col-3">แพลตฟอร์ม (Platform)</div>
        <div class="col-9 detail">{{ $form->pd_tsri_platform ? $form->pd_tsri_platform : '' }}</div>
    </div>
    <div class="row">
        <div class="col-3">ตัวชี้วัดเป้าหมาย (KR)</div>
        <div class="col-9 detail">{{ $form->pd_tsri_platform_kr ? $form->pd_tsri_platform_kr : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">ส่วนที่ 1 ข้อมูลทั่วไป</div>
    </div>

    <div class="row">
        <div class="col-12 title">1. ชื่อโครงการ</div>
    </div>
    <div class="row">
        <div class="col-2">( ภาษาไทย )</div>
        <div class="col-10 detail">{{ $form->pd_tsri_name_th ? $form->pd_tsri_name_th : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">( ภาษาอังกฤษ )</div>
        <div class="col-10 detail">{{ $form->pd_tsri_name_en ? $form->pd_tsri_name_en : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">2. ชื่อโครงการย่อยภายใต้โครงการ</div>
    </div>
    <div class="row">
        <div class="col-2">โครงการย่อยที่ 1</div>
        <div class="col-10 detail">{{ $form->pd_tsri_shot_th ? $form->pd_tsri_shot_th : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">โครงการย่อยที่ 2</div>
        <div class="col-10 detail">{{ $form->pd_tsri_shot_en ? $form->pd_tsri_shot_en : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">3. ลักษณะโครงการ</div>
    </div>
    @if ($form->pd_tsri_type == 1)
        <div class="row">
            <div class="col-4">โครงการใหม่ ที่เริ่มดำเนินการเสนอขอ</div>
            <div class="col-1">ดำเนินการ</div>
            <div class="col-2 detail">{{ $form->pd_tsri_year_con ? $form->pd_tsri_year_con : '' }}</div>
            <div class="col-3">ปี</div>
            <div class="col-2 detail"></div>
        </div>
    @elseif ($form->pd_tsri_type == 2)
        <div class="row">
            <div class="col-4">โครงการต่อเนื่อง จากปีงบประมาณที่ผ่านมา</div>
            <div class="col-1">ดำเนินการ</div>
            <div class="col-2 detail">{{ $form->pd_tsri_year_con ? $form->pd_tsri_year_con : '' }}</div>
            <div class="col-3">ปี / เริ่มรับงบประมาณปี</div>
            <div class="col-2 detail">{{ $form->pd_tsri_date_con ? $form->pd_tsri_date_con : '' }}</div>
        </div>
    @elseif ($form->pd_tsri_type == 3)
        <div class="row">
            <div class="col-4">ครงการต่อเนื่องที่มีข้อผูกพันสัญญา</div>
            <div class="col-1">ดำเนินการ</div>
            <div class="col-2 detail">{{ $form->pd_tsri_year_con ? $form->pd_tsri_year_con : '' }}</div>
            <div class="col-3">ปี / เริ่มรับงบประมาณปี</div>
            <div class="col-2 detail">{{ $form->pd_tsri_date_con ? $form->pd_tsri_date_con : '' }}</div>
        </div>
    @endif

    <div class="row">
        <div class="col-12 title">งบประมาณทั้งหมด</div>
    </div>
    <div class="row">
        <div class="col-2">งบประมาณทั้งหมดที่ขอรวมทั้งโครงการ</div>
        <div class="col-10 detail">{{ $form->pd_tsri_all_price ? $form->pd_tsri_all_price : '' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-2">ระยะดำเนินการทั้งหมด (ปี)</div>
        <div class="col-10 detail">{{ $form->pd_tsri_price_year ? $form->pd_tsri_price_year : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">ระยะเวลาเริ่มต้น</div>
        <div class="col-10 detail">{{ $form->pd_tsri_start ? date('m/Y', strtotime($form->pd_tsri_start)) : '' }}
        </div>
    </div>
    <div class="row">
        <div class="col-2">ระยะเวลาสิ้นสุด</div>
        <div class="col-10 detail">{{ $form->pd_tsri_end ? date('m/Y', strtotime($form->pd_tsri_end)) : '' }}
        </div>
    </div>
    <div class="row">
        <div class="col-2">ปีงบประมาณ ปีที่ 1</div>
        <div class="col-10 detail">{{ $form->pd_tsri_price1 ? $form->pd_tsri_price1 : '0' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-2">ปีงบประมาณ ปีที่ 2</div>
        <div class="col-10 detail">{{ $form->pd_tsri_price2 ? $form->pd_tsri_price2 : '0' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-2">ปีงบประมาณ ปีที่ 3</div>
        <div class="col-10 detail">{{ $form->pd_tsri_price3 ? $form->pd_tsri_price3 : '0' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-2">ปีงบประมาณ ปีที่ 4</div>
        <div class="col-10 detail">{{ $form->pd_tsri_price4 ? $form->pd_tsri_price4 : '0' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-2">ปีงบประมาณ ปีที่ 5</div>
        <div class="col-10 detail">{{ $form->pd_tsri_price5 ? $form->pd_tsri_price5 : '0' }} บาท</div>
    </div>

    <div class="row">
        <div class="col-12 title">ผลการดำเนินที่ผ่านมา (กรณีที่เป็นโครงการต่อเนื่อง)</div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover" width="100%" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th>ปีงบประมาณ</th>
                        <th>ผลการดําเนินงานเทียบกับแผนที่ตั้งไว้ (%)</th>
                        <th>งบประมาณที่ได้รับจัดสรร (บาท)</th>
                        <th>งบประมาณที่ใช้จริง (บาท)</th>
                        <th>สัดส่วนงบประมาณที่ใช้จริง (%)</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($form->ProposalDevTSRIResult))
                        @forelse ( $form->ProposalDevTSRIResult as $key => $ProposalDevTSRIResult )
                            <tr>
                                <td>{{ $ProposalDevTSRIResult->result_tsri_year }}</td>
                                <td>{{ $ProposalDevTSRIResult->result_tsri_plan }}</td>
                                <td>{{ $ProposalDevTSRIResult->result_tsri_price }}</td>
                                <td>{{ $ProposalDevTSRIResult->result_tsri_buy }}</td>
                                <td>{{ $ProposalDevTSRIResult->result_tsri_buy_percen }}</td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">ไม่พบข้อมูล</td>
                        </tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12 title">สรุปผลการดำเนินงานที่ผ่านมา</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_tsri_result ? $form->pd_tsri_result : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">4. คำสำคัญ (keywords)</div>
    </div>
    <div class="row">
        <div class="col-2">( ภาษาไทย )</div>
        <div class="col-10 detail">{{ $form->pd_tsri_keyword_th ? $form->pd_tsri_keyword_th : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">(ภาษาอังกฤษ)</div>
        <div class="col-10 detail">{{ $form->pd_tsri_keyword_en ? $form->pd_tsri_keyword_en : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">5. สาขาการวิจัย (เลือกจากฐานข้อมูลในระบบ)</div>
    </div>
    <div class="row">
        <div class="col-2">สาขาการวิจัยหลัก OECD</div>
        <div class="col-10 detail">{{ $form->pd_tsri_branch_main ? $form->pd_tsri_branch_main : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">สาขาการวิจัยย่อย OECD</div>
        <div class="col-10 detail">{{ $form->pd_tsri_branch_sub ? $form->pd_tsri_branch_sub : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">6. รายละเอียดของคณะผู้วิจัย
            (ใช้ฐานข้อมูลจากระบบข้อมูลสารสนเทศวิจัยและนวัตกรรมแห่งชาติ) ประกอบด้วย</div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover" width="100%" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th>หน่วยงาน</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ตำแหน่งในโครงการ</th>
                        <th>สัดส่วนการดำเนินการโครงการ</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($form->ProposalDevTSRIPeople))
                        @forelse ( $form->ProposalDevTSRIPeople as $key => $ProposalDevTSRIPeople )
                            <tr>
                                <td>{{ $ProposalDevTSRIPeople->people_tsri_name }}</td>
                                <td>{{ $ProposalDevTSRIPeople->people_tsri_company }}</td>
                                <td>{{ $ProposalDevTSRIPeople->people_tsri_position }}</td>
                                <td>{{ $ProposalDevTSRIPeople->people_tsri_percen }}</td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">ไม่พบข้อมูล</td>
                        </tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12 title">ส่วนที่ 2 ข้อมูลโครงการ</div>
    </div>
    <div class="row">
        <div class="col-2">เอกสารที่ต้องการอัปโหลดเพิ่มเติม</div>
        <div class="col-10 detail">{{ $form->pd_tsri_file_name1 ? $form->pd_tsri_file_name1 : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">ส่วนที่ 3 ข้อมูลแผนงาน</div>
    </div>
    <div class="row">
        <div class="col-2">เอกสารที่ต้องการอัปโหลดเพิ่มเติม</div>
        <div class="col-10 detail">{{ $form->pd_tsri_file_name2 ? $form->pd_tsri_file_name2 : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">ส่วนที่ 4 ผลผลิต/ผลลัพธ์/ผลกระทบ</div>
    </div>
    <div class="row">
        <div class="col-2">เอกสารที่ต้องการอัปโหลดเพิ่มเติม</div>
        <div class="col-10 detail">{{ $form->pd_tsri_file_name3 ? $form->pd_tsri_file_name3 : '' }}</div>
    </div>

</div>

<!-- <pre>{{ print_r($r) }}</pre> -->
