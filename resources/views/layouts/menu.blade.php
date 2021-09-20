<!-- need to remove -->
<li class="nav-item">
	<a href="{{ route('admin.index') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
		<i class="nav-icon fas fa-tachometer-alt"></i>
		<p>ภาพรวม</p>
	</a>
</li>
<li class="nav-item">
	<a href="{{ route('admin-members.index') }}"
		class="nav-link {{ request()->is('admin-members*') ? 'active' : '' }}">
		<i class="nav-icon fas fa-users"></i>
		<p>ข้อมูลผู้ใช้</p>
	</a>
</li>
<li
	class="
		nav-item
		{{ request()->is('admin-shoppinglist*') ? 'menu-is-opening menu-open' : '' }}
	"
>
	<a href="#" class="nav-link {{ request()->is('admin-shoppinglist*') ? 'active' : '' }}">
		<i class="nav-icon fas fa-tags"></i>
		<p>
			Shoppinglist
			<i class="fas fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">

		<li class="nav-item">
			<a href="{{ route('admin-shoppinglists-main.index') }}"
				class="nav-link {{ request()->is('admin-shoppinglists-main') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>หมวดหมู่หัวข้อวิจัย</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('admin-shoppinglists-secondary.index') }}"
				class="nav-link {{ request()->is('admin-shoppinglists-secondary') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>หัวข้อวิจัย</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('admin-shoppinglists-additional.index') }}"
				class="nav-link {{ request()->is('admin-shoppinglists-additional') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>หัวข้อวิจัยเพิ่มเติม</p>
			</a>
		</li>

		<!-- <li class="nav-item">
			<a href="{{ route('admin-shoppinglist.index') }}"
				class="nav-link {{ request()->is('admin-shoppinglist') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>จัดการหมวดหมู่</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('admin-shoppinglist-categorys.index') }}"
				class="nav-link {{ request()->is('admin-shoppinglist-categorys') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>หัวข้อวิจัย</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('admin-shoppinglist-additional.index') }}"
				class="nav-link {{ request()->is('admin-shoppinglist-additional') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>หัวข้อวิจัยเพิ่มเติม</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('admin-shoppinglist-branch.index') }}"
				class="nav-link {{ request()->is('admin-shoppinglist-branch') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>จัดการสาขา</p>
			</a>
		</li> -->

	</ul>
</li>

<!--
<li class="nav-item">
	<a href="{{ route('admin-shoppinglist.index') }}" class="nav-link {{ request()->is('admin-shoppinglist*') ? 'active' : '' }}">
		<i class="nav-icon fas fa-tags"></i>
		<p>Shopinglist</p>
	</a>
</li>
-->

<li class="nav-item">
	<a href="{{ route('admin-concept-development.index') }}"
		class="nav-link {{ request()->is('admin-concept-development') ? 'active' : '' }}">
		<i class="nav-icon fas fa-file-alt"></i>
		<p>Concept Development</p>
	</a>
</li>
<li class="nav-item">
	<a href="{{ route('admin-proposal-development.index') }}"
		class="nav-link {{ request()->is('admin-proposal-development') ? 'active' : '' }}">
		<i class="nav-icon fas fa-file-powerpoint"></i>
		<p>Proposal Development</p>
	</a>
</li>
<li class="nav-item">
	<a href="{{ route('admin-proposal-submission.index') }}"
		class="nav-link {{ request()->is('admin-proposal-submission') ? 'active' : '' }}">
		<i class="nav-icon fas fa-file-powerpoint"></i>
		<p>Proposal Submission</p>
	</a>
</li>

<!-- <li class="nav-item">
	<a href="{{ route('admin-concepdevelopment.index') }}"
		class="nav-link {{ request()->is('admin-concepdevelopment*') ? 'active' : '' }}">
		<i class="nav-icon fas fa-file-alt"></i>
		<p>Concept Development</p>
	</a>
</li>
<li class="nav-item">
	<a href="{{ route('admin-proposaldevelopment.index') }}"
		class="nav-link {{ request()->is('admin-proposaldevelopment*') ? 'active' : '' }}">
		<i class="nav-icon fas fa-file-powerpoint"></i>
		<p>Proposal Development</p>
	</a>
</li>
<li class="nav-item">
	<a href="{{ route('admin-psubmission.index') }}"
		class="nav-link {{ request()->is('admin-psubmission*') ? 'active' : '' }}">
		<i class="nav-icon fas fa-file-powerpoint"></i>
		<p>Proposal Submission</p>
	</a>
</li> -->

<li class="nav-item">
	<a href="{{ route('admin-progress.index') }}"
		class="nav-link {{ request()->is('admin-progress') ? 'active' : '' }}">
		<i class="nav-icon fas fa-chart-line"></i>
		<p>ความก้าวหน้าโครงการ</p>
	</a>
</li>
<li class="nav-item">
	<a href="{{ route('admin-report.index') }}"
		class="nav-link {{ request()->is('admin-report*') ? 'active' : '' }}">
		<i class="nav-icon fas fa-chart-area"></i>
		<p>Report</p>
	</a>
</li>
<!--
<li class="nav-item">
	<a href="{{ route('admin-progressreport.index') }}"
		class="nav-link {{ request()->is('admin-progressreport*') ? 'active' : '' }}">
		<i class="nav-icon fas fa-chart-bar"></i>
		<p>รายงานความก้าวหน้า</p>
	</a>
</li>
-->
<!-- Open Sub Menu -->
<li
	class="
		nav-item
		{{ request()->is('admin-general*') ? 'menu-is-opening menu-open' : '' }}
	"
>
	<a href="#" class="nav-link {{ request()->is('admin-general*') ? 'active' : '' }}">
		<i class="nav-icon fas fa-database"></i>
		<p>
			ข้อมูลทั่วไป
			<i class="fas fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="{{ route('admin-general-prefix.index') }}"
				class="nav-link {{ request()->is('admin-general-prefix*') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>คำนำหน้าชื่อ</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('admin-general-department.index') }}" class="nav-link {{ request()->is('admin-general-department*') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>หน่วยงาน</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('admin-general-budget.index') }}" class="nav-link {{ request()->is('admin-general-budget*') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>แหล่งงบประมาณ</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('admin-general-research.index') }}" class="nav-link {{ request()->is('admin-general-research*') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>ประเภทโครงการวิจัย</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('admin-general-status.index') }}" class="nav-link {{ request()->is('admin-general-status*') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>ประเภทสถานะ</p>
			</a>
		</li>
	</ul>
</li>
<li
	class="
		nav-item
		{{ request()->is('admin-setting*') ? 'menu-is-opening menu-open' : '' }}
	"
>
	<a href="#" class="nav-link {{ request()->is('admin-setting*') ? 'active' : '' }}">
		<i class="nav-icon fas fa-cog"></i>
		<p>
			ตั้งค่า
			<i class="fas fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="{{ route('admin-setting-banner.index') }}" class="nav-link {{ request()->is('admin-setting-banner*') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>Banner</p>
			</a>
		</li>
		<!--
		<li class="nav-item">
			<a href="{{ route('admin-setting-aboutus.index') }}" class="nav-link {{ request()->is('admin-setting-aboutus*') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>About us</p>
			</a>
		</li>
	-->
		<li class="nav-item">
			<a href="{{ route('admin-setting-news.index') }}" class="nav-link {{ request()->is('admin-setting-news*') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>News</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('admin-setting-admin.index') }}" class="nav-link {{ request()->is('admin-setting-admin*') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>Admin</p>
			</a>
		</li>
	</ul>
</li>
<!--
<li
	class="
		nav-item
		{{ request()->is('admin-old*') ? 'menu-is-opening menu-open' : '' }}
	"
>
	<a href="#" class="nav-link {{ request()->is('admin-old*') ? 'active' : '' }}">
		<i class="nav-icon fas fa-copy"></i>
		<p>
			Old Projects
			<i class="fas fa-angle-left right"></i>
		</p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
			<a href="{{ route('admin-old-projectbudget.index') }}"
				class="nav-link {{ request()->is('admin-old-projectbudget*') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>โครงการที่ยื่นของบประมาณ</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('admin-old-projectapprove.index') }}"
				class="nav-link {{ request()->is('admin-old-projectapprove*') ? 'active' : '' }}">
				<i class="far fa-circle nav-icon"></i>
				<p>โครงการที่ยื่นขออนุมัติดำเนินการ</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="pages/layout/boxed.html" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>ความก้าวหน้าของโครงการวิจัย</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="pages/layout/fixed-sidebar.html" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>รายงานโครงการที่ยื่นของบประมาณ</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>รายงานโครงการที่ยื่นขออนุมัติดำเนินการ</p>
			</a>
		</li>
		<li class="nav-item">
			<a href="pages/layout/fixed-topnav.html" class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				<p>รายงานความก้าวหน้า</p>
			</a>
		</li>
	</ul>
</li>

<li class="nav-item">
	<a href="#" class="nav-link">
		<p>โครงการที่ยื่นของบประมาณ(ระบบเก่า)</p>
	</a>
</li>
<li class="nav-item">
	<a href="#" class="nav-link">
		<p>โครงการที่ยื่นขออนุมัติดำเนินการ(ระบบเก่า)</p>
	</a>
</li>
<li class="nav-item">
	<a href="#" class="nav-link">
		<p>ความก้าวหน้าของโครงการวิจัย(ระบบเก่า)</p>
	</a>
</li>
<li class="nav-item">
	<a href="#" class="nav-link">
		<p>รายงานโครงการที่ยื่นของบประมาณ(ระบบเก่า)</p>
	</a>
</li>
<li class="nav-item">
	<a href="#" class="nav-link">
		<p>รายงานโครงการที่ยื่นของบประมาณ(ระบบเก่า)</p>
	</a>
</li>
<li class="nav-item">
	<a href="#" class="nav-link">
		<p>รายงานโครงการที่ยื่นขออนุมัติดำเนินการ(ระบบเก่า)</p>
	</a>
</li>
<li class="nav-item">
	<a href="#" class="nav-link">
		<p>รายงานความก้าวหน้า(ระบบเก่า)</p>
	</a>
</li>
-->
