<div class="container">

    <div class="row">
        <div class="col-12 report-title">
            แบบฟอร์มข้อเสนอโครงการวิจัย (Research Project)<br />
            ข้อรับการสนับสนุนงบประมาณกองทุนสนันสนุนงานการวิชาการ กรมการแพทย์
        </div>
    </div>

    <div class="row">
        <div class="col-12 title">ชื่อโครงการวิจัย</div>
    </div>
    <div class="row">
        <div class="col-2">( ภาษาไทย )</div>
        <div class="col-10 detail">{{ $form->pd_rese_name_th ? $form->pd_rese_name_th : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">( ภาษาอังกฤษ )</div>
        <div class="col-10 detail">{{ $form->pd_rese_name_th ? $form->pd_rese_name_th : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">ชื่อโครงการวิจัย (กรณีเป็นโครงการวิจัยภายใต้แผนงานวิจัย)</div>
    </div>
    <div class="row">
        <div class="col-2">( ภาษาไทย )</div>
        <div class="col-10 detail">{{ $form->pd_rese_plan_th ? $form->pd_rese_plan_th : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">( ภาษาอังกฤษ )</div>
        <div class="col-10 detail">{{ $form->pd_rese_plan_en ? $form->pd_rese_plan_en : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">งบประมาณทั้งหมด</div>
    </div>
    <div class="row">
        <div class="col-2">งบประมาณทั้งหมดที่ขอรวมทั้งโครงการ</div>
        <div class="col-10 detail">{{ $form->pd_rese_all_price ? $form->pd_rese_all_price : '' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-2">ระยะดำเนินการทั้งหมด (ปี)</div>
        <div class="col-10 detail">{{ $form->pd_rese_price_year ? $form->pd_rese_price_year : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">ระยะเวลาเริ่มต้น</div>
        <div class="col-10 detail">{{ $form->pd_rese_start ? date('m/Y', strtotime($form->pd_rese_start)) : '' }}
        </div>
    </div>
    <div class="row">
        <div class="col-2">ระยะเวลาสิ้นสุด</div>
        <div class="col-10 detail">{{ $form->pd_rese_end ? date('m/Y', strtotime($form->pd_rese_end)) : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">ปีงบประมาณ ปีที่ 1</div>
        <div class="col-10 detail">{{ $form->pd_rese_price1 ? $form->pd_rese_price1 : '0' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-2">ปีงบประมาณ ปีที่ 2</div>
        <div class="col-10 detail">{{ $form->pd_rese_price2 ? $form->pd_rese_price2 : '0' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-2">ปีงบประมาณ ปีที่ 3</div>
        <div class="col-10 detail">{{ $form->pd_rese_price3 ? $form->pd_rese_price3 : '0' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-2">ปีงบประมาณ ปีที่ 4</div>
        <div class="col-10 detail">{{ $form->pd_rese_price4 ? $form->pd_rese_price4 : '0' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-2">ปีงบประมาณ ปีที่ 5</div>
        <div class="col-10 detail">{{ $form->pd_rese_price5 ? $form->pd_rese_price5 : '0' }} บาท</div>
    </div>

    <div class="row">
        <div class="col-12 title">ส่วน ก: ลักษณะการวิจัย</div>
    </div>
        @if ($form->pd_rese_type === 0)
        <div class="row">
            <div class="col-12 detail">โครงการวิจัยใหม่</div>
        </div>
        @elseif($form->pd_rese_type === 1)
        <div class="row">
            <div class="col-12 detail">โครงการวิจัยต่อเนื่อง ระยะเวลา {{ ($form->pd_rese_type_pass) ? $form->pd_rese_type_pass : '' }} ปีนี้เป็นปีที่ {{ ($form->pd_rese_type_year) ? $form->pd_rese_type_year : '' }}</div>
        </div>
        @endif
    <div class="row">
        <div class="col-12 title">1.
            อธิบายความสอดคล้องของโครงการวิจัยกับนโยบาย/ยุทธศาสตร์ชาติ/กระทรวงสาธารณะสุข/กรมการแพทย์/หน่วยงาน</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_rese_details_plan ? $form->pd_rese_details_plan : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">2. มาตรฐานการวิจัย</div>
    </div>
    <div class="row">
        <div class="col-12 detail">
            {{ $form->pd_rese_standard ? $rese_standard[$form->pd_rese_standard] : '' }}
        </div>
    </div>

    <div class="row">
        <div class="col-12 title">ส่วน ข: องค์ประกอบในการจัดทำโครงการวิจัย</div>
    </div>
    <div class="row">
        <div class="col-2">เอกสารที่ต้องการอัปโหลดเพิ่มเติม</div>
        <div class="col-10 detail">{{ $form->pd_rese_file_name1 }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">ส่วน ค ประวัติคณะผู้วิจัย</div>
    </div>
    <div class="row">
        <div class="col-2">เอกสารที่ต้องการอัปโหลดเพิ่มเติม</div>
        <div class="col-10 detail">{{ $form->pd_rese_file_name2 }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">อัปโหลดเอกสารเพิ่มเติม</div>
    </div>
    <div class="row">
        <div class="col-2">เอกสารที่ต้องการอัปโหลดเพิ่มเติม</div>
        <div class="col-10 detail">{{ $form->pd_rese_file_name3 }}</div>
    </div>

</div>

<!-- <pre>{{ print_r($r) }}</pre> -->
