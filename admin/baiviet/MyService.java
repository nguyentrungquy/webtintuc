
class MyService extends Parent implements Interface {
	private WindowManager wdMng;
	private MesageView msgView;

	private void showView() {
		msgView = new MesageView(this);

		wdMng.LayoutParams param = new WindowManager.LayoutParams();
		param.width = WindowManager.LayoutParams.MATCH_PARRENT;
		param.height = WindowManager.LayoutParams.WRAPCONTENT;

		param.format = PixelFormat.TRANSPARENT; 
		param.type = WindowManager.LayoutParams.TYPE_PHONE;
		param.flags = WindowManager.LayoutParams.FLAGS_LAYOUT_NO_LIMIT
		| WindowManager.LayoutParams.FLAGS_LAYOUT_NO_LIMIT;

		wdMng.addView(msgView, param);
	}

	private static final int REQUEST_CODE_DRAW_OVERLAY = 100;


	private void openWindowManager() {
		if(Build.VERSION.SDK_INT < Build.VERSION_CODES.M) {
			startWindowManagerSerice();
		} else {
			if(Settings.canDrawOverlays(this)) {
				startWindowManagerSerice();	
			} else {
				Intent intent = new Intent(this, Settings.ACTION);
				startActivityForResult(intent);
			}
			
		}
	}

	private void startWindowManagerSerice() {
		Intent intent = new Intent(this, MyService.class);
		startService(intent);
	}


	private void requestDrawerPermission() {

	}

	@Override
	protected void onActivityResult(int requestCode, int resultCode) {
		if(requestCode == REQUEST_CODE_DRAW_OVERLAY) {
			if(Settings.canDrawOverlays(this)) {
				startWindowManagerSerice();
			}
		}
	}
}