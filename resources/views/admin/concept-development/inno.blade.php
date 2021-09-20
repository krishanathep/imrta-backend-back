<div class="container">

	<div class="row">
		<div class="col-12 report-title">
			แบบฟอร์มนวัตกรรม
			<div style="height: 10px;"></div>
			Concept Development
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">1. ชื่อนวัตกรรม</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $r->concept_dev_inno_name }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">2. หัวหน้าทีมพัฒนา / เจ้าของหัวเรื่องนวัตกรรม</div>
	</div>
	<div class="row">
		<div class="col-2">คำนำหน้า</div>
		<div class="col-3 detail">{{ $r->inno_prefix_name }}</div>
		<div class="col-2">ชื่อ-นามสกุล</div>
		<div class="col-5 detail">{{ $r->concept_dev_inno_user_name }}</div>
	</div>
	<div class="row">
		<div class="col-2">ตำแหน่ง</div>
		<div class="col-3 detail">{{ $r->concept_dev_inno_position }}</div>
		<div class="col-2">หน่วยงาน</div>
		<div class="col-5 detail">{{ $r->inno_department_name }}</div>
	</div>
	<div class="row">
		<div class="col-2">อีเมลล์</div>
		<div class="col-3 detail">{{ $r->concept_dev_inno_email }}</div>
		<div class="col-2">เบอร์โทรศัพท์</div>
		<div class="col-5 detail">{{ $r->concept_dev_inno_phone }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">3. ทีมพัฒนา (รวมทีมและหน่วยงานภายนอก)</div>
	</div>
	@if ( $r->concept_dev_inno_team )
		@if ( $r->concept_dev_inno_user1 != "" )
		<div class="row">
			<div class="col-1" style="text-align: center; font-family: KanitRegular;">1.</div>
			<div class="col-1">คำนำหน้า</div>
			<div class="col-3 detail">{{ $r->inno_user1_prefix_name }}</div>
			<div class="col-2">ชื่อ-นามสกุล</div>
			<div class="col-5 detail">{{ $r->concept_dev_inno_user1 }}</div>
		</div>
		<div class="row">
			<div class="col-1"></div>
			<div class="col-1">ตำแหน่ง</div>
			<div class="col-3 detail">{{ $r->concept_dev_inno_position1 }}</div>
			<div class="col-2">หน่วยงาน</div>
			<div class="col-5 detail">{{ $r->inno_user1_department_name }}</div>
		</div>
		@endif
		@if ( $r->concept_dev_inno_user2 != "" )
		<div class="row">
			<div class="col-1" style="text-align: center; font-family: KanitRegular;">2.</div>
			<div class="col-1">คำนำหน้า</div>
			<div class="col-3 detail">{{ $r->inno_user2_prefix_name }}</div>
			<div class="col-2">ชื่อ-นามสกุล</div>
			<div class="col-5 detail">{{ $r->concept_dev_inno_user2 }}</div>
		</div>
		<div class="row">
			<div class="col-1"></div>
			<div class="col-1">ตำแหน่ง</div>
			<div class="col-3 detail">{{ $r->concept_dev_inno_position2 }}</div>
			<div class="col-2">หน่วยงาน</div>
			<div class="col-5 detail">{{ $r->inno_user2_department_name }}</div>
		</div>
		@endif
	@else
	<div class="row">
		<div class="col-12 detail">ไม่มี</div>
	</div>
	@endif

	<div class="row">
		<div class="col-12 title">4. ประเภทนวัตกรรม</div>
	</div>
	<div class="row">
		<div class="col-12 detail">
			@if ( $r->concept_dev_inno_type == 1 )
			ตอบสนองนโยบาย
			@elseif ( $r->concept_dev_inno_type == 2 )
			บริการ
			@elseif ( $r->concept_dev_inno_type == 3 )
			นวัฒกรรมแห่งอนาคต
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">5. ความเป็นมาและความสำคัญของปัญหา</div>
	</div>
	<div class="row">
		<div class="col-12" style="padding-left: 15px;">5.1 ความเป็นมา (แสดงกระบวนการหรือขั้นตอนเดิมก่อนคิดริเริ่มที่จะพัฒนานวัตกรรม)</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $r->concept_dev_inno_background }}</div>
	</div>
	<div class="row">
		<div class="col-12" style="padding-left: 15px;">5.2 ผลกระทบของปัญหาเกิดกับใคร จำนวนเท่าไร และอยู่ในระดับหน่วยงาน หรือระดับภูมิภาคหรือประเทศ</div>
	</div>
	<div class="row">
		<div class="col-3" style="padding-left: 30px;">5.2.1 กลุ่มที่ได้รับผลกระทบ</div>
		<div class="col-9 detail">{{ $r->concept_dev_inno_group }}</div>
	</div>
	<div class="row">
		<div class="col-3" style="padding-left: 30px;">5.2.2 จำนวนผู้ที่ได้รับผลกระทบ</div>
		<div class="col-9 detail">{{ $r->concept_dev_inno_count }}</div>
	</div>
	<div class="row">
		<div class="col-3" style="padding-left: 30px;">5.2.3 ระดับของปัญหา</div>
		<div class="col-9 detail">
			@if ( $r->concept_dev_inno_rank == 1 )
			ระดับหน่วยงาน
			@elseif ( $r->concept_dev_inno_rank == 2 )
			ระดับภูมิภาค
			@elseif ( $r->concept_dev_inno_rank == 3 )
			ระดับประเทศ
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">6. ประโยชน์ที่ประชาชน ผู้รับบริการคาดว่าจะได้รับจากนวัตกรรมนี้</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $r->concept_dev_inno_benefit }}</div>
	</div>

</div>

<!-- <pre>{{ print_r($r) }}</pre> -->
