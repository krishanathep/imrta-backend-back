<div class="container">
    <div class="row">
        <div class="col-12 report-title">ข้อเสนอการวิจัยและนวัตกรรม</div>
    </div>
    <div class="row">
        <div class="col-12 title">ชื่อโครงการวิจัย</div>
    </div>
    <div class="row">
        <div class="col-2">( ภาษาไทย )</div>
        <div class="col-10 detail">{{ $form->proposal_dev_nriis_name_th ? $form->proposal_dev_nriis_name_th : '' }}
        </div>
    </div>
    <div class="row">
        <div class="col-2">( ภาษาอังกฤษ )</div>
        <div class="col-10 detail">{{ $form->proposal_dev_nriis_name_en ? $form->proposal_dev_nriis_name_en : '' }}
        </div>
    </div>

    <div class="row">
        <div class="col-12 title">ส่วน ก : องค์ประกอบของข้อเสนอโครงการวิจัย</div>
    </div>
    <div class="row">
        <div class="col-12 title">1. ผู้รับผิดชอบประกอบด้วย
            (กรณีเป็นทุนความร่วมมือกับต่างประเทศให้ระบุผู้รับผิดชอบทั้ง “ฝ่ายไทย” และ “ฝ่ายต่างประเทศ”)</div>
    </div>
    <div class="row">
        <div class="col-2">1.1 หัวหน้าโครงการ</div>
        <div class="col-10 detail">{{ $form->people_nriis_head_name ? $form->people_nriis_head_name : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">1.2 ผู้ร่วมงานวิจัย</div>
        <div class="col-10 detail">{{ $form->people_nriis_name ? $form->people_nriis_name : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">1.3 ที่ปรึกษา</div>
        <div class="col-10 detail">
            {{ $form->people_nriis_consultant_name ? $form->people_nriis_consultant_name : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">1.4 หน่วยงานหลัก</div>
        <div class="col-10 detail">{{ $form->people_nriis_company ? $form->people_nriis_company : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">1.5 หน่วยงานสนับสนุน</div>
        <div class="col-10 detail">
            {{ $form->people_nriis_company_support ? $form->people_nriis_company_support : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">2. ประเภทการวิจัย (เลือกประเภทการวิจัยเพียง 1 ประเภท)</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ ($form->proposal_dev_nriis_type) ? $nriis_type[$form->proposal_dev_nriis_type] : '' }}
        </div>
    </div>

    <div class="row">
        <div class="col-12 title">3. สาขาวิชาการและกลุ่มวิชาที่ทำการวิจัย</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->proposal_dev_nriis_branch ? $form->proposal_dev_nriis_branch : '' }}
        </div>
    </div>

    <div class="row">
        <div class="col-12 title">4. คำสำคัญ (Keyword) การวิจัย</div>
    </div>
    <div class="row">
        <div class="col-12 detail">
            {{ $form->proposal_dev_nriis_main_keyword ? $form->proposal_dev_nriis_main_keyword : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">5. ความสำคัญ และที่มาของปัญหา</div>
    </div>
    <div class="row">
        <div class="col-12 detail">
            {{ $form->proposal_dev_nriis_source_problem ? $form->proposal_dev_nriis_source_problem : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">6. วัตถุประสงค์ของการวิจัย</div>
    </div>
    <div class="row">
        <div class="col-12 detail">
            {{ $form->proposal_dev_nriis_objectives ? $form->proposal_dev_nriis_objectives : '' }}</div>
    </div>
    <div class="row">
        <div class="col-4">7. เป้าหมายของผลผลิต (Output) และตัวชี้วัด</div>
        <div class="col-8 detail">{{ $form->pd_nriis_output ? $form->pd_nriis_output : '' }}</div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th rowspan="2">ลำดับ</th>
                        <th rowspan="2">ผลผลิตที่จะนำส่ง</th>
                        <th colspan="2">ตัวชี้วัด</th>
                    </tr>
                    <tr>
                        <th rowspan="1">ตัวชี้วัดเชิงปริมาณ</th>
                        <th rowspan="1">ตัวชี้วัดเชิงคุณภาพ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1.</td>
                        <td>
                            <div class="row">
                                <div class="col-4">องค์ความรู้</div>
                                <div class="col-8 detail">
                                    {{ $form->pd_nriis_output_knowledge ? $form->pd_nriis_output_knowledge : '' }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="detail">
                                {{ $form->pd_nriis_output_knowledge_qtitive ? $form->pd_nriis_output_knowledge_qtitive : '' }}
                            </div>
                        </td>
                        <td>
                            <div class="detail">
                                {{ $form->pd_nriis_output__knowledge_qtative ? $form->pd_nriis_output__knowledge_qtative : '' }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">2.</td>
                        <td>
                            <div class="row">
                                <div class="col-2">คู่มือ</div>
                                <div class="col-4 detail">
                                    {{ $form->pd_nriis_output_manual ? $form->pd_nriis_output_manual : '' }}
                                </div>
                                <div class="col-2">สำหรับ</div>
                                <div class="col-4 detail">
                                    {{ $form->pd_nriis_output_manual_for ? $form->pd_nriis_output_manual_for : '' }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="detail">
                                {{ $form->pd_nriis_output_manual_qtitive ? $form->pd_nriis_output_manual_qtitive : '' }}
                            </div>
                        </td>
                        <td>
                            <div class="detail">
                                {{ $form->pd_nriis_output__manual_qtative ? $form->pd_nriis_output__manual_qtative : '' }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">3.</td>
                        <td>
                            <div class="row">
                                <div class="col-4">แนวทาง</div>
                                <div class="col-8 detail">
                                    {{ $form->pd_nriis_output_Guide ? $form->pd_nriis_output_Guide : '' }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="detail">
                                {{ $form->pd_nriis_output_Guide_qtitive ? $form->pd_nriis_output_Guide_qtitive : '' }}
                            </div>
                        </td>
                        <td>
                            <div class="detail">
                                {{ $form->pd_nriis_output_Guidelines_qtative ? $form->pd_nriis_output_Guidelines_qtative : '' }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">4.</td>
                        <td>
                            ผลงานทางวิชาการ การตีพิมพ์
                            <div class="row">
                                <div class="col-2">จำนวน</div>
                                <div class="col-4 detail">
                                    {{ $form->pd_nriis_output_publication ? $form->pd_nriis_output_publication : '' }}
                                </div>
                                <div class="col-2">เรื่อง</div>
                            </div>
                        </td>
                        <td>
                            <div class="detail">
                                {{ $form->pd_nriis_output_public_qtitive ? $form->pd_nriis_output_public_qtitive : '' }}
                            </div>
                        </td>
                        <td>
                            <div class="detail">
                                {{ $form->pd_nriis_output_public_qtative ? $form->pd_nriis_output_public_qtative : '' }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">5.</td>
                        <td>
                            <div class="row">
                                <div class="col-3">อื่นๆ</div>
                                <div class="col-9 detail">
                                    {{ $form->pd_nriis_output_other ? $form->pd_nriis_output_other : '' }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="detail">
                                {{ $form->pd_nriis_output_other_qtitive ? $form->pd_nriis_output_other_qtitive : '' }}
                            </div>
                        </td>
                        <td>
                            <div class="detail">
                                {{ $form->pd_nriis_output_other_qtative ? $form->pd_nriis_output_other_qtative : '' }}
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12 title">8. การทบทวนวรรณกรรม/สารสนเทศ (Information) ที่เกี่ยวข้อง</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_nriis_Information ? $form->pd_nriis_Information : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">9. ทฤษฎี สมมติฐานและ/หรือกรอบแนวความคิดของการวิจัย</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_nriis_theory ? $form->pd_nriis_theory : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">10. ระยะเวลาทำการวิจัย และแผนการดำเนินงานตลอดโครงการวิจัย</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_nriis_period ? $form->pd_nriis_period : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">11. วิธีการดำเนินการวิจัย</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_nriis_action ? $form->pd_nriis_action : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">12. ขอบเขตของการวิจัย</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_nriis_scope ? $form->pd_nriis_scope : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">13. แผนการบริหารแผนงานวิจัยและแผนการดำเนินงานพร้อมทั้งขั้นตอนตลอดโครงการวิจัย
            และโปรดระบุการบริหารความเสี่ยง</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_nriis_risk ? $form->pd_nriis_risk : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">14. หน่วยงานที่นำผลการวิจัยไปใช้ประโยชน์</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_nriis_organize_used1 ? $form->pd_nriis_organize_used1 : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">15. สถานที่ทำวิจัย</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_nriis_site ? $form->pd_nriis_site : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">16. เอกสารอ้างอิงของการวิจัย</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_nriis_references ? $form->pd_nriis_references : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">17. แผนการดำเนินงานวิจัย</div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th rowspan="2">กิจกรรม</th>
                        <th colspan="2">เดือน</th>
                        <th rowspan="2">ผลผลิตส่งมอบ</th>
                    </tr>
                    <tr>
                        <th rowspan="2">เดือนเริ่มต้น</th>
                        <th rowspan="2">เดือนสิ้นสุด </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                                {{ $form->pd_nriis_plan_action1 ? $form->pd_nriis_plan_action1 : '' }}
                        </td>
                        <td>
                                {{ $form->pd_nriis_plan_start1 ? $form->pd_nriis_plan_start1 : '' }}
                        </td>
                        <td>
                                {{ $form->pd_nriis_plan_end1 ? $form->pd_nriis_plan_end1 : '' }}
                        </td>
                        <td>
                                {{ $form->pd_nriis_plan_product1 ? $form->pd_nriis_plan_product1 : '' }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                                {{ $form->pd_nriis_plan_action2 ? $form->pd_nriis_plan_action2 : '' }}
                        </td>
                        <td>
                                {{ $form->pd_nriis_plan_start2 ? $form->pd_nriis_plan_start2 : '' }}
                        </td>
                        <td>
                                {{ $form->pd_nriis_plan_end2 ? $form->pd_nriis_plan_end2 : '' }}
                        </td>
                        <td>
                                {{ $form->pd_nriis_plan_product2 ? $form->pd_nriis_plan_product2 : '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12 title">18. งบประมาณโครงการวิจัย</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_nriis_budget_project ? $form->pd_nriis_budget_project : '' }} บาท
        </div>
    </div>
    <div class="row">
        <div class="col-2">ระยะดำเนินการทั้งหมด (ปี)</div>
        <div class="col-10 detail">{{ $form->pd_nriis_price_year ? $form->pd_nriis_price_year : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">ระยะเวลาเริ่มต้น</div>
        <div class="col-10 detail">{{ $form->pd_nriis_start ? $form->pd_nriis_start : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">ระยะเวลาสิ้นสุด</div>
        <div class="col-10 detail">{{ $form->pd_nriis_end ? $form->pd_nriis_end : '' }}</div>
    </div>
    <div class="row">
        <div class="col-2">ปีงบประมาณ ปีที่ 1</div>
        <div class="col-10 detail">{{ $form->pd_nriis_price1 ? $form->pd_nriis_price1 : '0' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-2">ปีงบประมาณ ปีที่ 2</div>
        <div class="col-10 detail">{{ $form->pd_nriis_price2 ? $form->pd_nriis_price2 : '0' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-2">ปีงบประมาณ ปีที่ 3</div>
        <div class="col-10 detail">{{ $form->pd_nriis_price3 ? $form->pd_nriis_price3 : '0' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-2">ปีงบประมาณ ปีที่ 4</div>
        <div class="col-10 detail">{{ $form->pd_nriis_price4 ? $form->pd_nriis_price4 : '0' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-2">ปีงบประมาณ ปีที่ 5</div>
        <div class="col-10 detail">{{ $form->pd_nriis_price5 ? $form->pd_nriis_price5 : '0' }} บาท</div>
    </div>

    <div class="row">
        <div class="col-4">1.งบบุคลากร งบประมาณที่เสนอขอ</div>
        <div class="col-8 detail">{{ $form->pd_nriis_budget_person ? $form->pd_nriis_budget_person : '' }} บาท
        </div>
    </div>
    <div class="row">
        <div class="col-4">1.1 ค่าจ้างชั่วคราว งบประมาณที่เสนอขอ</div>
        <div class="col-8 detail">{{ $form->pd_nriis_budget_parttime ? $form->pd_nriis_budget_parttime : '' }} บาท
        </div>
    </div>
    <div class="row">
        <div class="col-4">1.2 อื่นๆระบุ</div>
        <div class="col-8 detail">
            {{ $form->pd_nriis_budget_other_name1 ? $form->pd_nriis_budget_other_name1 : '' }}
            {{ $form->pd_nriis_budget_other1 ? $form->pd_nriis_budget_other1 : '' }} บาท</div>
    </div>

    <div class="row">
        <div class="col-4">2.งบดำเนินการ งบประมาณที่เสนอขอ</div>
        <div class="col-8 detail">{{ $form->pd_nriis_budget_operating ? $form->pd_nriis_budget_operating : '' }}
            บาท</div>
    </div>
    <div class="row">
        <div class="col-4">2.1 ค่าตอบแทน งบประมาณที่เสนอขอ</div>
        <div class="col-8 detail">{{ $form->pd_nriis_budget_compen ? $form->pd_nriis_budget_compen : '' }} บาท
        </div>
    </div>
    <div class="row">
        <div class="col-4">2.2 ค่าใช้สอย งบประมาณที่เสนอขอ</div>
        <div class="col-8 detail">{{ $form->pd_nriis_budget_cost ? $form->pd_nriis_budget_cost : '' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-4">2.3 อื่นๆระบุ</div>
        <div class="col-8 detail">
            {{ $form->pd_nriis_budget_other_name2 ? $form->pd_nriis_budget_other_name2 : '' }}
            {{ $form->pd_nriis_budget_other2 ? $form->pd_nriis_budget_other2 : '' }} บาท</div>
    </div>

    <div class="row">
        <div class="col-4">3.งบลงทุน งบประมาณที่เสนอขอ</div>
        <div class="col-8 detail">{{ $form->pd_nriis_budget_equipment ? $form->pd_nriis_budget_equipment : '' }}
            บาท</div>
    </div>
    <div class="row">
        <div class="col-4">3.1 ค่าครุภัณฑ์ งบประมาณที่เสนอขอ</div>
        <div class="col-8 detail">
            {{ $form->pd_nriis_budget_durable_articles ? $form->pd_nriis_budget_durable_articles : '' }} บาท</div>
    </div>
    <div class="row">
        <div class="col-4">3.2 อื่นๆระบุ</div>
        <div class="col-8 detail">
            {{ $form->pd_nriis_budget_other_name3 ? $form->pd_nriis_budget_other_name3 : '' }}
            {{ $form->pd_nriis_budget_other3 ? $form->pd_nriis_budget_other3 : '' }} บาท</div>
    </div>

    <div class="row">
        <div class="col-4">4.ค่าธรรมเนียมอุดหนุนสถาบัน (ให้หมายถึงค่าสาธรณูปโภคด้วย)</div>
        <div class="col-8 detail">
            {{ $form->pd_nriis_budget_support_fee ? $form->pd_nriis_budget_support_fee : '' }} บาท</div>
    </div>

    <div class="row">
        <div class="col-12 title">19. เป้าหมายของผลลัพธ์ (Outcome) และตัวชี้วัด</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_nriis_outcome ? $form->pd_nriis_outcome : '' }} </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th rowspan="2">ลำดับ</th>
                        <th rowspan="2">ผลผลิตที่จะนำส่ง</th>
                        <th colspan="2">ตัวชี้วัด</th>
                    </tr>
                    <tr>
                        <th rowspan="1">ตัวชี้วัดเชิงปริมาณ</th>
                        <th rowspan="1">ตัวชี้วัดเชิงคุณภาพ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1.</td>
                        <td>{{ $form->pd_nriis_outcome1 ? $form->pd_nriis_outcome1 : '' }}</td>
                        <td>{{ $form->pd_nriis_outcome1_qtitive ? $form->pd_nriis_outcome1_qtitive : '' }}</td>
                        <td>{{ $form->pd_nriis_outcome1_qtative ? $form->pd_nriis_outcome1_qtative : '' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">2.</td>
                        <td>{{ $form->pd_nriis_outcome2 ? $form->pd_nriis_outcome2 : '' }}</td>
                        <td>{{ $form->pd_nriis_outcome2_qtitive ? $form->pd_nriis_outcome2_qtitive : '' }}</td>
                        <td>{{ $form->pd_nriis_outcome2_qtative ? $form->pd_nriis_outcome2_qtative : '' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">3.</td>
                        <td>{{ $form->pd_nriis_outcome3 ? $form->pd_nriis_outcome3 : '' }}</td>
                        <td>{{ $form->pd_nriis_outcome3_qtitive ? $form->pd_nriis_outcome3_qtitive : '' }}</td>
                        <td>{{ $form->pd_nriis_outcome3_qtative ? $form->pd_nriis_outcome3_qtative : '' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">4.</td>
                        <td>{{ $form->pd_nriis_outcome4 ? $form->pd_nriis_outcome4 : '' }}</td>
                        <td>{{ $form->pd_nriis_outcome4_qtitive ? $form->pd_nriis_outcome4_qtitive : '' }}</td>
                        <td>{{ $form->pd_nriis_outcome4_qtative ? $form->pd_nriis_outcome4_qtative : '' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">5.</td>
                        <td>{{ $form->pd_nriis_outcome5 ? $form->pd_nriis_outcome5 : '' }}</td>
                        <td>{{ $form->pd_nriis_outcome5_qtitive ? $form->pd_nriis_outcome5_qtitive : '' }}</td>
                        <td>{{ $form->pd_nriis_outcome5_qtative ? $form->pd_nriis_outcome5_qtative : '' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12 title">20. ประโยชน์ที่คาดว่าจะได้รับ</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_nriis_benefit ? $form->pd_nriis_benefit : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">21. หน่วยงานที่นำผลการวิจัยไปใช้ประโยชน์</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_nriis_organize_used2 ? $form->pd_nriis_organize_used2 : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">22. ผลสำเร็จ</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_nriis_success ? $form->pd_nriis_success : '' }}</div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table_nriis_kr">
                <thead class="text-center">
                    <tr>
                        <th class="text-center">ปี</th>
                        <th class="text-center">ผลสำเร็จที่คาดว่าจะได้รับ</th>
                        <th class="text-center">ประเภท *</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><div class="col-12">{{ $form->pd_nriis_success_year1 ? $form->pd_nriis_success_year1 : '' }}</div></td>
                        <td><div class="col-12">{{ $form->pd_nriis_success_expect1 ? $form->pd_nriis_success_expect1 : '' }}</div></td>
                        <td><div class="col-12">{{ $form->pd_nriis_success_type1 ? $success_type[$form->pd_nriis_success_type1] : '' }}</div></td>
                    </tr>
                    <tr>
                        <td><div class="col-12">{{ $form->pd_nriis_success_year2 ? $form->pd_nriis_success_year2 : '' }}</div></td>
                        <td><div class="col-12">{{ $form->pd_nriis_success_expect2 ? $form->pd_nriis_success_expect2 : '' }}</div></td>
                        <td><div class="col-12">{{ $form->pd_nriis_success_type2 ? $success_type[$form->pd_nriis_success_type2] : '' }}</div></td>
                    </tr>
                    <tr>
                        <td><div class="col-12">{{ $form->pd_nriis_success_year3 ? $form->pd_nriis_success_year3 : '' }}</div></td>
                        <td><div class="col-12">{{ $form->pd_nriis_success_expect3 ? $form->pd_nriis_success_expect3 : '' }}</div></td>
                        <td><div class="col-12">{{ $form->pd_nriis_success_type3 ? $success_type[$form->pd_nriis_success_type3] : '' }}</div></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12 title">23. ข้อเสนอการวิจัยหรือส่วนหนึ่งส่วนใดของข้อเสนอการวิจัยนี้ (เลือกได้เพียง 1 ข้อ)
        </div>
    </div>

    <div class="row">
        <div class="col-12 title">3. ลักษณะโครงการ</div>
    </div>
    <div class="row">
        <div class="col-12 detail">
            <?php if ($form->pd_nriis_proposal) {
                if ($form->pd_nriis_proposal == 1) {
                    echo 'ไม่ได้เสนอ';
                } elseif ($form->pd_nriis_proposal == 2) {
                    echo 'เสนอ';
                }
            } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 title">24. คำชี้แจงอื่นๆ</div>
    </div>
    <div class="row">
        <div class="col-12 detail">{{ $form->pd_nriis_explantion ? $form->pd_nriis_explantion : '' }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">ส่วน ก เพิ่มเติม : ลายมือชื่อ</div>
    </div>
    <div class="row">
        <div class="col-2">เอกสารที่ต้องการอัปโหลดเพิ่มเติม</div>
        <div class="col-10 detail">{{ $form->pd_nriis_file_name1 }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">ส่วน ข : ประวัติคณะผู้วิจัย</div>
    </div>
    <div class="row">
        <div class="col-2">เอกสารที่ต้องการอัปโหลดเพิ่มเติม</div>
        <div class="col-10 detail">{{ $form->pd_nriis_file_name2 }}</div>
    </div>

    <div class="row">
        <div class="col-12 title">อัปโหลดเอกสารเพิ่มเติม</div>
    </div>
    <div class="row">
        <div class="col-2">เอกสารที่ต้องการอัปโหลดเพิ่มเติม</div>
        <div class="col-10 detail">{{ $form->pd_nriis_file_name3 }}</div>
    </div>

</div>

<!-- <pre>{{ print_r($r) }}</pre> -->
