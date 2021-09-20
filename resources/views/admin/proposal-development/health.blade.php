<div class="container">

	<div class="row">
		<div
			class="col-12 report-title"
		>
			หัวข้อโครงร่างวิจัย<br/>
			เรื่อง การประเมินเศรษฐศาสตร์สาธารณสุข (Health Economic Evaluation)
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">1.ชื่อโครงการวิจัย</div>
	</div>
	<div class="row">
		<div class="col-2">( ภาษาไทย )</div>
		<div class="col-10 detail">{{ $form->pd_health_name_th }}</div>
	</div>
	<div class="row">
		<div class="col-2">( ภาษาอังกฤษ )</div>
		<div class="col-10 detail">{{ $form->pd_health_name_en }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">งบประมาณทั้งหมด</div>
	</div>
	<div class="row">
		<div class="col-4">งบประมาณทั้งหมดที่ขอรวมทั้งโครงการ</div>
		<div class="col-8 detail">{{ $form->pd_health_all_price }} บาท</div>
	</div>
	<div class="row">
		<div class="col-4">ระยะดำเนินการทั้งหมด (ปี)</div>
		<div class="col-8 detail">{{ $form->pd_health_price_year }}</div>
	</div>
	<div class="row">
		<div class="col-2">ระยะเวลาเริ่มต้น</div>
		<div class="col-10 detail">{{ $form->pd_health_start }}</div>
	</div>
	<div class="row">
		<div class="col-2">ระยะเวลาสิ้นสุด</div>
		<div class="col-10 detail">{{ $form->pd_health_end }}</div>
	</div>
	<div class="row">
		<div class="col-2">ปีงบประมาณ ปีที่ 1</div>
		<div class="col-10 detail">{{ $form->pd_health_price1 }} บาท</div>
	</div>
	<div class="row">
		<div class="col-2">ปีงบประมาณ ปีที่ 2</div>
		<div class="col-10 detail">{{ $form->pd_health_price2 }} บาท</div>
	</div>
	<div class="row">
		<div class="col-2">ปีงบประมาณ ปีที่ 3</div>
		<div class="col-10 detail">{{ $form->pd_health_price3 }} บาท</div>
	</div>
	<div class="row">
		<div class="col-2">ปีงบประมาณ ปีที่ 4</div>
		<div class="col-10 detail">{{ $form->pd_health_price4 }} บาท</div>
	</div>
	<div class="row">
		<div class="col-2">ปีงบประมาณ ปีที่ 5</div>
		<div class="col-10 detail">{{ $form->pd_health_price5 }} บาท</div>
	</div>

	<div class="row">
		<div class="col-12 title">2.ที่ปรึกษาและคณะผู้วิจัย</div>
	</div>
	<div class="row">
		<div class="col-12 title">ที่ปรึกษา 1</div>
	</div>
	<div class="row">
		<div class="col-2">คำนำหน้า</div>
		<div class="col-4 detail">{{ $peoples[0]->prefix_name }}</div>
		<div class="col-2">ชื่อ-นามสกุล</div>
		<div class="col-4 detail">{{ $peoples[0]->pd_health_people_name }}</div>
	</div>
	<div class="row">
		<div class="col-2">ตำแหน่ง</div>
		<div class="col-4 detail">{{ $peoples[0]->position_name }}</div>
		<div class="col-2">หน่วยงาน</div>
		<div class="col-4 detail">{{ $peoples[0]->department_name }}</div>
	</div>
	<div class="row">
		<div class="col-2">อีเมลล์</div>
		<div class="col-4 detail">{{ $peoples[0]->pd_health_people_email }}</div>
		<div class="col-2">เบอร์โทรศัพท์</div>
		<div class="col-4 detail">{{ $peoples[0]->pd_health_people_phone }}</div>
	</div>
	<div class="row">
		<div class="col-12 title">ที่ปรึกษา 2</div>
	</div>
	<div class="row">
		<div class="col-2">คำนำหน้า</div>
		<div class="col-4 detail">{{ $peoples[1]->prefix_name }}</div>
		<div class="col-2">ชื่อ-นามสกุล</div>
		<div class="col-4 detail">{{ $peoples[1]->pd_health_people_name }}</div>
	</div>
	<div class="row">
		<div class="col-2">ตำแหน่ง</div>
		<div class="col-4 detail">{{ $peoples[1]->position_name }}</div>
		<div class="col-2">หน่วยงาน</div>
		<div class="col-4 detail">{{ $peoples[1]->department_name }}</div>
	</div>
	<div class="row">
		<div class="col-2">อีเมลล์</div>
		<div class="col-4 detail">{{ $peoples[1]->pd_health_people_email }}</div>
		<div class="col-2">เบอร์โทรศัพท์</div>
		<div class="col-4 detail">{{ $peoples[1]->pd_health_people_phone }}</div>
	</div>
	<div class="row">
		<div class="col-12 title">คณะผู้วิจัย 1</div>
	</div>
	<div class="row">
		<div class="col-2">คำนำหน้า</div>
		<div class="col-4 detail">{{ $peoples[2]->prefix_name }}</div>
		<div class="col-2">ชื่อ-นามสกุล</div>
		<div class="col-4 detail">{{ $peoples[2]->pd_health_people_name }}</div>
	</div>
	<div class="row">
		<div class="col-2">ตำแหน่ง</div>
		<div class="col-4 detail">{{ $peoples[2]->position_name }}</div>
		<div class="col-2">หน่วยงาน</div>
		<div class="col-4 detail">{{ $peoples[2]->department_name }}</div>
	</div>
	<div class="row">
		<div class="col-2">อีเมลล์</div>
		<div class="col-4 detail">{{ $peoples[2]->pd_health_people_email }}</div>
		<div class="col-2">เบอร์โทรศัพท์</div>
		<div class="col-4 detail">{{ $peoples[2]->pd_health_people_phone }}</div>
	</div>
	<div class="row">
		<div class="col-2">สัดส่วน</div>
		<div class="col-4 detail">{{ $peoples[2]->pd_health_percent }} %</div>
	</div>
	<div class="row">
		<div class="col-12 title">คณะผู้วิจัย 2</div>
	</div>
	<div class="row">
		<div class="col-2">คำนำหน้า</div>
		<div class="col-4 detail">{{ $peoples[3]->prefix_name }}</div>
		<div class="col-2">ชื่อ-นามสกุล</div>
		<div class="col-4 detail">{{ $peoples[3]->pd_health_people_name }}</div>
	</div>
	<div class="row">
		<div class="col-2">ตำแหน่ง</div>
		<div class="col-4 detail">{{ $peoples[3]->position_name }}</div>
		<div class="col-2">หน่วยงาน</div>
		<div class="col-4 detail">{{ $peoples[3]->department_name }}</div>
	</div>
	<div class="row">
		<div class="col-2">อีเมลล์</div>
		<div class="col-4 detail">{{ $peoples[3]->pd_health_people_email }}</div>
		<div class="col-2">เบอร์โทรศัพท์</div>
		<div class="col-4 detail">{{ $peoples[3]->pd_health_people_phone }}</div>
	</div>
	<div class="row">
		<div class="col-2">สัดส่วน</div>
		<div class="col-4 detail">{{ $peoples[3]->pd_health_percent }} %</div>
	</div>
	<div class="row">
		<div class="col-12 title">คณะผู้วิจัย 3</div>
	</div>
	<div class="row">
		<div class="col-2">คำนำหน้า</div>
		<div class="col-4 detail">{{ $peoples[4]->prefix_name }}</div>
		<div class="col-2">ชื่อ-นามสกุล</div>
		<div class="col-4 detail">{{ $peoples[4]->pd_health_people_name }}</div>
	</div>
	<div class="row">
		<div class="col-2">ตำแหน่ง</div>
		<div class="col-4 detail">{{ $peoples[4]->position_name }}</div>
		<div class="col-2">หน่วยงาน</div>
		<div class="col-4 detail">{{ $peoples[4]->department_name }}</div>
	</div>
	<div class="row">
		<div class="col-2">อีเมลล์</div>
		<div class="col-4 detail">{{ $peoples[4]->pd_health_people_email }}</div>
		<div class="col-2">เบอร์โทรศัพท์</div>
		<div class="col-4 detail">{{ $peoples[4]->pd_health_people_phone }}</div>
	</div>
	<div class="row">
		<div class="col-2">สัดส่วน</div>
		<div class="col-4 detail">{{ $peoples[4]->pd_health_percent }} %</div>
	</div>

	<div class="row">
		<div class="col-12 title">4.บทนำ (ความเป็นมาและความสำคัญของปัญหา)</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->pd_health_introduction }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">5.การทบทวนวรรณกรรม</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->pd_health_review }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">6.คำถามวิจัย</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->pd_health_questions }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">7.วัตถุประสงค์ (เปรียบเทียบต้นทุนประสิทธิผลของ สิ่งที่ศึกษา กับ ตัวเปรียบเทียบ)</div>
	</div>
	<div class="row">
		<div class="col-12 detail">{{ $form->pd_health_objectives }}</div>
	</div>

	<div class="row">
		<div class="col-12 title">ส่วนที่ 2 อัปโหลดเอกสารเพิ่มเติม</div>
	</div>
	<div class="row">
		<div class="col-2">เอกสารที่ต้องการอัปโหลดเพิ่มเติม</div>
		<div class="col-10 detail">
			<a href="{{ $front_base }}uploads/{{ $form->pd_health_file_path1 }}" target="_blank">
				{{ $form->pd_health_file_name1 }}
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col-12 title">อัปโหลดเอกสารเพิ่มเติม</div>
	</div>
	<div class="row">
		<div class="col-2">เอกสารที่ต้องการอัปโหลดเพิ่มเติม</div>
		<div class="col-10 detail">
			<a href="{{ $front_base }}uploads/{{ $form->pd_health_file_path2 }}" target="_blank">
				{{ $form->pd_health_file_name2 }}
			</a>
		</div>
	</div>

</div>

<!-- <pre>{{ print_r($r) }}</pre> -->
