<div class="container">

	<div class="row">
		<div
			class="col-12 report-title"
		>
			แบบฟอร์ม Proposal Development<br/>
			ประเภท นวัตกรรม (Innovation)
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">1.ประเภทโครงการนวัตกรรม</div>
	</div>
	<div class="row">
		<div class="col-12 detail">
			@if ( $form->proposal_dev_inno_type == 1 )
			โครงการใหม่
			@elseif ( $form->proposal_dev_inno_type == 2 )
			โครงการต่อเนื่อง
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">1.ชื่อโครงการวิจัย</div>
	</div>
	<div class="row">
		<div class="col-2">( ภาษาไทย )</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_name_th }}</div>
	</div>
	<div class="row">
		<div class="col-2">( ภาษาอังกฤษ )</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_name_en }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">งบประมาณทั้งหมด</div>
	</div>
	<div class="row">
		<div class="col-2">งบประมาณทั้งหมดที่ขอรวมทั้งโครงการ</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_all_price }} บาท</div>
	</div>
	<div class="row">
		<div class="col-2">ระยะดำเนินการทั้งหมด (ปี)</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_price_year }}</div>
	</div>
	<div class="row">
		<div class="col-2">ระยะเวลาเริ่มต้น</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_start }}</div>
	</div>
	<div class="row">
		<div class="col-2">ระยะเวลาสิ้นสุด</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_end }}</div>
	</div>
	<div class="row">
		<div class="col-2">ปีงบประมาณ ปีที่ 1</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_price1 }} บาท</div>
	</div>
	<div class="row">
		<div class="col-2">ปีงบประมาณ ปีที่ 2</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_price2 }} บาท</div>
	</div>
	<div class="row">
		<div class="col-2">ปีงบประมาณ ปีที่ 3</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_price3 }} บาท</div>
	</div>
	<div class="row">
		<div class="col-2">ปีงบประมาณ ปีที่ 4</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_price4 }} บาท</div>
	</div>
	<div class="row">
		<div class="col-2">ปีงบประมาณ ปีที่ 5</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_price5 }} บาท</div>
	</div>

	<div class="row">
		<div class="col-12 title">4.รูปภาพนวัตกรรม (แนบไฟล์ JPG หรือ PNG)</div>
	</div>
	<div class="row">
		<div class="col-12 detail">
			<img src="{{ asset('backend/assets/'.$form->proposal_dev_inno_image) }}" style="max-height: 200px;"/>
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">5.ประเภทนวัตกรรม (เลือกได้มากกว่า 1)</div>
	</div>
	<div class="row">
		<div class="col-12 detail">
			@foreach($form->proposal_dev_inno_type_plan_array as $plan)
			
				@if ( $plan == 1 )
				<div>ตอบสนองนโยบาย</div>
				@endif

				@if ( $plan == 2 )
				<div>บริการ</div>
				@endif

				@if ( $plan == 3 )
				<div>นวัฒกรรมแห่งอนาคต</div>
				@endif

				@if ( $plan == 4 )
				<div>อื่นๆ</div>
				@endif
			
			@endforeach
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">6.ทีมพัฒนานวัตกรรม</div>
	</div>
	<div class="row">
		<div class="col-12 title">6.1 หัวหน้าทีมพัฒนา / เจ้าของหัวข้อเรื่องนวัตกรรม</div>
	</div>
	<div class="row">
		<div class="col-2">คำนำหน้า</div>
		<div class="col-4 detail">{{ $form->prefix_name0 }}</div>
		<div class="col-2">ชื่อ-นามสกุล</div>
		<div class="col-4 detail">{{ $form->proposal_dev_inno_user_name }}</div>
	</div>
	<div class="row">
		<div class="col-2">ตำแหน่ง</div>
		<div class="col-4 detail">{{ $form->position_name0 }}</div>
		<div class="col-2">หน่วยงาน</div>
		<div class="col-4 detail">
			@if ( $form->proposal_dev_inno_company_other )
			{{ $form->proposal_dev_inno_company_other }}
			@else
			{{ $form->department_name0 }}
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-2">อีเมลล์</div>
		<div class="col-4 detail">{{ $form->proposal_dev_inno_email }}</div>
		<div class="col-2">เบอร์โทรศัพท์</div>
		<div class="col-4 detail">{{ $form->proposal_dev_inno_phone }}</div>
	</div>
	<div class="row">
		<div class="col-12 title">6.2 ทีมพัฒนานวัตกรรม</div>
	</div>
	<div class="row">
		<div class="col-2">คำนำหน้า</div>
		<div class="col-4 detail">{{ $form->prefix_name1 }}</div>
		<div class="col-2">ชื่อ-นามสกุล</div>
		<div class="col-4 detail">{{ $form->proposal_dev_inno_user1 }}</div>
	</div>
	<div class="row">
		<div class="col-2">ตำแหน่ง</div>
		<div class="col-4 detail">{{ $form->position_name1 }}</div>
		<div class="col-2">หน่วยงาน</div>
		<div class="col-4 detail">
			@if ( $form->proposal_dev_inno_company_other1 )
			{{ $form->proposal_dev_inno_company_other1 }}
			@else
			{{ $form->department_name1 }}
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-2">คำนำหน้า</div>
		<div class="col-4 detail">{{ $form->prefix_name2 }}</div>
		<div class="col-2">ชื่อ-นามสกุล</div>
		<div class="col-4 detail">{{ $form->proposal_dev_inno_user2 }}</div>
	</div>
	<div class="row">
		<div class="col-2">ตำแหน่ง</div>
		<div class="col-4 detail">{{ $form->position_name2 }}</div>
		<div class="col-2">หน่วยงาน</div>
		<div class="col-4 detail">
			@if ( $form->proposal_dev_inno_company_other2 )
			{{ $form->proposal_dev_inno_company_other2 }}
			@else
			{{ $form->department_name2 }}
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">7.ความเป็นมาและความสำคัญของปัญหา</div>
	</div>
	<div class="row">
		<div class="col-12 title">7.1 ความเป็นมา (แสดงกระบวนการหรือขั้นตอนเดิมก่อนคิดริเริ่มที่จะพัฒนานวัตกรรม)</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->proposal_dev_inno_background }}</div>
	</div>
	<div class="row">
		<div class="col-12 title">7.2 ผลกระทบของปัญหาเกิดกับใคร จำนวนเท่าไร และอยู่ในระดับหน่วยงาน หรือระดับภูมิภาคหรือระดับประเทศ</div>
	</div>
	<div class="row">
		<div class="col-3">7.2.1 กลุ่มที่ได้รับผลกระทบ</div>
		<div class="col-9 detail">{{ $form->proposal_dev_inno_affected_group }}</div>
	</div>
	<div class="row">
		<div class="col-3">7.2.2 จำนวนผู้ที่ได้รับผลกระทบ</div>
		<div class="col-9 detail">{{ $form->proposal_dev_inno_affected_people }}</div>
	</div>
	<div class="row">
		<div class="col-3">7.2.3 ระดับขนาดของปัญหา</div>
		<div class="col-9 detail">
			@if ( $form->proposal_dev_inno_problem_level == 1 )
			ระดับหน่วยงาน
			@elseif ( $form->proposal_dev_inno_problem_level == 2 )
			ระดับภูมิภาค
			@elseif ( $form->proposal_dev_inno_problem_level == 3 )
			ระดับประเทศ
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">8.ขั้นตอนการพัฒนานวัตกรรมที่ดำเนินการแล้ว</div>
	</div>
	<div class="row">
		<div class="col-12 detail">
			@if ( $form->proposal_dev_inno_dec_procress == 1 )
			ยกร่างต้นแบบชิ้นงานนวัตกรรม
			@elseif ( $form->proposal_dev_inno_dec_procress == 2 )
			ทดสอบประสิทธิภาพเพื่อรับรองต้นแบบนวัตกรรม
			@elseif ( $form->proposal_dev_inno_dec_procress == 3 )
			อื่นๆ
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">9.วิธีดำเนินการวิจัยและพัฒนา</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->proposal_dev_inno_procedure }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">10.แหล่งทุนที่จะขอรับการสนับสนุน</div>
	</div>
	<div class="row">
		<div class="col-12 detail">
			@if ( $form->proposal_dev_inno_budget_other )
			{{ $form->proposal_dev_inno_budget_other }}
			@else
			{{ $form->budget_name }}
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">11.สถานที่ดำเนินการ</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->proposal_dev_inno_place }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">12.กลุ่มเป้าหมาย</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->proposal_dev_inno_target }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">13.แนวทางการแก้ไขปัญหาและการนำไปปฏิบัติ/โอกาสในการพัฒนา</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->proposal_dev_inno_solutions }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">14.ผลผลิตและผลลัพธ์ที่สำคัญจากการดำเนินการ</div>
	</div>
	<div class="row">
		<div class="col-2">14.1 ผลผลิต</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_product }}</div>
	</div>
	<div class="row">
		<div class="col-2">14.2 ผลลัพธ์</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_result }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">15.ประโยชน์ที่ประชาชน/ผู้รับบริการได้รับจากนวัตกรรมนี้</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->proposal_dev_inno_benefits }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">17.แนวทางการจัดการผลกระทบทางลบที่อาจเกิดขึ้นจากโครงการนี้</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->proposal_dev_inno_guidelines }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">18.การจดคุ้มครองทรัพย์สินทางปัญญา (ลิขสิทธิ์/สิทธิบัตร/อนุสิทธิบัตร หรืออื่นๆ)</div>
	</div>
	@if ( $form->proposal_dev_inno_intellectual_property == 1 )
	<div class="row">
		<div class="col-12 detail">ยังไม่ได้จด</div>
	</div>
	@endif
	@if ( $form->proposal_dev_inno_intellectual_property == 2 )
	<div class="row">
		<div class="col-2">จดแล้ว ประเภท</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_ip_type }}</div>
		<div class="col-2">ชื่อผู้ขอจด ชื่อ</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_ip_name }} {{ $form->proposal_dev_inno_ip_lname }}</div>
		<div class="col-2">ชื่อหน่วยงาน</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_ip_conpany }}</div>
	</div>
	<div class="row">
		<div class="col-2">อยู่ระหว่างดาเนินการ ประเภท</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_ip_type }}</div>
		<div class="col-2">ชื่อผู้ขอจด ชื่อ</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_ip_name }} {{ $form->proposal_dev_inno_ip_lname }}</div>
		<div class="col-2">ชื่อหน่วยงาน</div>
		<div class="col-10 detail">{{ $form->proposal_dev_inno_ip_conpany }}</div>
	</div>
	@endif

	<div class="row">
		<div class="col-12 title">อัปโหลดเอกสารเพิ่มเติม</div>
	</div>
	<div class="row">
		<div class="col-3">เอกสารที่ต้องการอัปโหลดเพิ่มเติม</div>
		<div class="col-9 detail">
			<a href="{{ $front_base }}uploads/{{ $form->proposal_dev_inno_file_path1 }}" target="_blank">
				{{ $form->proposal_dev_inno_file_name1 }}
			</a>
		</div>
	</div>

</div>

<!-- <pre>{{ print_r($r) }}</pre> -->
