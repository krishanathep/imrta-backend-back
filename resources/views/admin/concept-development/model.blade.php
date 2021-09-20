<div class="container">

	<div class="row">
		<div
			class="col-12 report-title"
		>Concept paper โครงการวิจัย</div>
	</div>

	<div class="row">
		<div class="col-12 title">1. หัวข้อที่ต้องการดำเนินการวิจัย</div>
	</div>
	<div class="row">
		<div class="col-2">ชื่อเรื่องภาษาไทย</div>
		<div class="col-10 detail">{{ $r->concept_dev_name_th }}</div>
	</div>
	<div class="row">
		<div class="col-2">ภาษาอังกฤษ (ถ้ามี)</div>
		<div class="col-10 detail">{{ $r->concept_dev_name_en }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">2. ชื่อหน่วยงาน</div>
	</div>
	<div class="row">
		<div class="col-12 detail">
			@if ( $r->concept_dev_department_id > 0 )
			{{ $r->department_name }}
			@else
			{{ $r->concept_dev_department_other }}
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">3. ผู้วิจัย</div>
	</div>
	<div class="row">
		<div class="col-2">คำนำหน้า</div>
		<div class="col-3 detail">{{ $r->prefix_name_th }}</div>
		<div class="col-2">ชื่อ-นามสกุล</div>
		<div class="col-5 detail">{{ $r->concept_dev_user_name }}</div>
	</div>
	<div class="row">
		<div class="col-2">ตำแหน่ง</div>
		<div class="col-3 detail">{{ $r->concept_dev_position }}</div>
		<div class="col-2">เบอร์โทรศัพท์</div>
		<div class="col-5 detail">{{ $r->concept_dev_phone }}</div>
	</div>
	<div class="row">
		<div class="col-2">อีเมลล์</div>
		<div class="col-10 detail">{{ $r->concept_dev_email }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">4. คำถามการวิจัย</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $r->concept_dev_question }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">5. วัตถุประสงค์ของการวิจัย</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $r->concept_dev_objective }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">6. ที่มาและความสำคัญของปัญหา</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $r->concept_dev_importance }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">7. ประโยชน์ที่คาดว่าจะได้รับจากงานวิจัยนี้</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $r->concept_dev_benefit }}</div>
	</div>

</div>

<!-- <pre>{{ print_r($r) }}</pre> -->
