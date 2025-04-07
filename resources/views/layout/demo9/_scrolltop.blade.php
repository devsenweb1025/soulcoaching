<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop start-0" data-kt-scrolltop="true">
	<div class="mouse-icon">
		<div class="mouse">
			<div class="wheel"></div>
		</div>
	</div>
</div>
<!--end::Scrolltop-->

<style>
	.mouse-icon {
		width: 26px;
		height: 40px;
		border: 2px solid #ffffff;
		border-radius: 15px;
		position: relative;
	}

	.mouse {
		width: 3px;
		height: 8px;
		background-color: #ffffff;
		position: absolute;
		top: 4px;
		left: 50%;
		transform: translateX(-50%);
		border-radius: 2px;
		animation: scroll 1.5s infinite;
	}

	.wheel {
		width: 3px;
		height: 8px;
		background-color: #ffffff;
		position: absolute;
		top: 4px;
		left: 50%;
		transform: translateX(-50%);
		border-radius: 2px;
	}

	@keyframes scroll {
		0% {
			transform: translate(-50%, 15px);
			opacity: 1;
		}
		100% {
			transform: translate(-50%, 0px);
			opacity: 0;
		}
	}

	#kt_scrolltop {
		border-radius: 50%;
		width: 54px;
		height: 54px;
        bottom: 14px;
        left: 14px!important;
        right: 0px;
		display: flex;
		align-items: center;
		justify-content: center;
		cursor: pointer;
		transition: all 0.3s ease;
	}
</style>
