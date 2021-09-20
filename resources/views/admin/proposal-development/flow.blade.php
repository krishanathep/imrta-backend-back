<div class="container">

	<div class="row">
		<div
			class="col-12 report-title"
		>
			แบบฟอร์มการเขียนโครงการวิจัย<br/>
			ประเภท การทบทวนอย่างเป็นระบบ (Systematic reviews)
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">1.ชื่อโครงการวิจัย</div>
	</div>
	<div class="row">
		<div class="col-2">( ภาษาไทย )</div>
		<div class="col-10 detail">{{ $form->proposal_dev_flow_name_th }}</div>
	</div>
	<div class="row">
		<div class="col-2">( ภาษาอังกฤษ )</div>
		<div class="col-10 detail">{{ $form->proposal_dev_flow_name_en }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">งบประมาณทั้งหมด</div>
	</div>
	<div class="row">
		<div class="col-2">งบประมาณทั้งหมดที่ขอรวมทั้งโครงการ</div>
		<div class="col-10 detail">{{ $form->pd_flow_all_price }} บาท</div>
	</div>
	<div class="row">
		<div class="col-2">ระยะดำเนินการทั้งหมด (ปี)</div>
		<div class="col-10 detail">{{ $form->pd_flow_price_year }}</div>
	</div>
	<div class="row">
		<div class="col-2">ระยะเวลาเริ่มต้น</div>
		<div class="col-10 detail">{{ $form->pd_flow_start }}</div>
	</div>
	<div class="row">
		<div class="col-2">ระยะเวลาสิ้นสุด</div>
		<div class="col-10 detail">{{ $form->pd_flow_end }}</div>
	</div>
	<div class="row">
		<div class="col-2">ปีงบประมาณ ปีที่ 1</div>
		<div class="col-10 detail">{{ number_format($form->pd_flow_price1,2) }} บาท</div>
	</div>
	<div class="row">
		<div class="col-2">ปีงบประมาณ ปีที่ 2</div>
		<div class="col-10 detail">{{ number_format($form->pd_flow_price2,2) }} บาท</div>
	</div>
	<div class="row">
		<div class="col-2">ปีงบประมาณ ปีที่ 3</div>
		<div class="col-10 detail">{{ number_format($form->pd_flow_price3,2) }} บาท</div>
	</div>
	<div class="row">
		<div class="col-2">ปีงบประมาณ ปีที่ 4</div>
		<div class="col-10 detail">{{ number_format($form->pd_flow_price4,2) }} บาท</div>
	</div>
	<div class="row">
		<div class="col-2">ปีงบประมาณ ปีที่ 5</div>
		<div class="col-10 detail">{{ number_format($form->pd_flow_price5,2) }} บาท</div>
	</div>

	<div class="row">
		<div class="col-12 title">3. คณะผู้วิจัย / เจ้าของหัวข้อเรื่องการทบทวนอย่างเป็นระบบ</div>
	</div>
	<div class="row">
		<div class="col-2">คำนำหน้า</div>
		<div class="col-4 detail">{{ $form->prefix_name1 }}</div>
		<div class="col-2">ชื่อ-นามสกุล</div>
		<div class="col-4 detail">{{ $form->pd_flow_full_name1 }}</div>
	</div>
	<div class="row">
		<div class="col-2">ตำแหน่ง</div>
		<div class="col-4 detail">{{ $form->position_name1 }}</div>
		<div class="col-2">หน่วยงาน</div>
		<div class="col-4 detail">
			@if ( $form->pd_flow_department_other1 )
			{{ $form->pd_flow_department_other1 }}
			@else
			{{ $form->department_name1 }}
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-2">อีเมลล์</div>
		<div class="col-4 detail">{{ $form->pd_flow_email1 }}</div>
		<div class="col-2">เบอร์โทรศัพท์</div>
		<div class="col-4 detail">{{ $form->pd_flow_phone1 }}</div>
	</div>
	<div class="row">
		<div class="col-2">คำนำหน้า</div>
		<div class="col-4 detail">{{ $form->prefix_name2 }}</div>
		<div class="col-2">ชื่อ-นามสกุล</div>
		<div class="col-4 detail">{{ $form->pd_flow_full_name2 }}</div>
	</div>
	<div class="row">
		<div class="col-2">ตำแหน่ง</div>
		<div class="col-4 detail">{{ $form->position_name2 }}</div>
		<div class="col-2">หน่วยงาน</div>
		<div class="col-4 detail">
			@if ( $form->pd_flow_department_other2 )
			{{ $form->pd_flow_department_other2 }}
			@else
			{{ $form->department_name2 }}
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-2">อีเมลล์</div>
		<div class="col-4 detail">{{ $form->pd_flow_email2 }}</div>
		<div class="col-2">เบอร์โทรศัพท์</div>
		<div class="col-4 detail">{{ $form->pd_flow_phone2 }}</div>
	</div>

	<div class="row">
		<div class="col-2">คำนำหน้า</div>
		<div class="col-4 detail">{{ $form->prefix_name3 }}</div>
		<div class="col-2">ชื่อ-นามสกุล</div>
		<div class="col-4 detail">{{ $form->pd_flow_full_name3 }}</div>
	</div>
	<div class="row">
		<div class="col-2">ตำแหน่ง</div>
		<div class="col-4 detail">{{ $form->position_name3 }}</div>
		<div class="col-2">หน่วยงาน</div>
		<div class="col-4 detail">
			@if ( $form->pd_flow_department_other3 )
			{{ $form->pd_flow_department_other3 }}
			@else
			{{ $form->department_name3 }}
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-2">อีเมลล์</div>
		<div class="col-4 detail">{{ $form->pd_flow_email3 }}</div>
		<div class="col-2">เบอร์โทรศัพท์</div>
		<div class="col-4 detail">{{ $form->pd_flow_phone3 }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">4.ที่มาโครงการวิจัย</div>
	</div>
	<div class="row">
		<div class="col-12 title">รายละเอียดเงื่อนไขการทบทวน</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->pd_flow_condition }}</div>
	</div>
	<div class="row">
		<div class="col-12 title">รายละเอียดของเครื่องมือ/ การจัดการ</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->pd_flow_intervention }}</div>
	</div>
	<div class="row">
		<div class="col-12 title">เครื่องมือ/ การจัดการ สามารถแก้ปัญหาได้อย่างไร</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->pd_flow_intervention_midthwork }}</div>
	</div>
	<div class="row">
		<div class="col-12 title">อะไร เป็นความจำเป็น ที่ต้องทำการทบทวนงานชิ้นนี้</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->pd_flow_important }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">5.วัตถุประสงค์โครงการวิจัย</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->pd_flow_objective }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">ส่วนที่ 2 อัปโหลดเอกสารเพิ่มเติม</div>
	</div>
	<div class="row">
		<div class="col-4">เอกสารที่ต้องการอัปโหลดเพิ่มเติม</div>
		<div class="col-8 detail">
			<a href="{{ $front_base }}uploads/{{ $form->pd_flow_file_path1 }}" target="_blank">
				{{ $form->pd_flow_file_name1 }}
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">อัปโหลดเอกสารเพิ่มเติม</div>
	</div>
	<div class="row">
		<div class="col-4">เอกสารที่ต้องการอัปโหลดเพิ่มเติม</div>
		<div class="col-8 detail">
			<a href="{{ $front_base }}uploads/{{ form->pd_flow_file_path2 }}" target="_blank">
				{{ $form->pd_flow_file_name2 }}
			</a>
		</div>
	</div>

</div>

<!-- <pre>{{ print_r($r) }}</pre> -->
