<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\User\WalletController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BannerTextController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\User\WelcomeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PlayTwoDController;
use App\Http\Controllers\Admin\TwoDigitController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\User\UserWalletController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\TwoDWinnerController;
use App\Http\Controllers\Admin\TwoDLotteryController;
use App\Http\Controllers\Admin\TwoDMorningController;
use App\Http\Controllers\Admin\ThreedHistoryController;
use App\Http\Controllers\User\ChangePasswordController;
use App\Http\Controllers\Admin\ThreedMatchTimeController;
use App\Http\Controllers\Admin\FillBalanceReplyController;
use App\Http\Controllers\User\Threed\ThreeDPlayController;
use App\Http\Controllers\User\WithDraw\WithDrawController;
use App\Http\Controllers\Admin\TwoDEveningWinnerController;
use App\Http\Controllers\Admin\TwoDWinnerHistoryController;
use App\Http\Controllers\User\FillBalance\FillBalanceController;
use App\Http\Controllers\Admin\ThreeD\DailyThreeDIncomeOutComeController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
// Route::get('/user-profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('home');

Route::get('/', [App\Http\Controllers\User\WelcomeController::class, 'index'])->name('welcome');

//auth routes
Route::get('/login', [WelcomeController::class, 'userLogin'])->name('login');
Route::post('/login', [WelcomeController::class, 'login'])->name('login');
Route::post('/register', [WelcomeController::class, 'register'])->name('register');
Route::get('/register', [WelcomeController::class, 'userRegister'])->name('register');
//auth routes

//other pages
Route::get('/promotion', [App\Http\Controllers\User\WelcomeController::class, 'promo'])->name('promotion');
Route::get('/promotion-detail/{id}', [App\Http\Controllers\User\WelcomeController::class, 'promotionDetail'])->name('promotionDetail');
Route::get('/contact', [WelcomeController::class, 'servicePage'])->name('contact');
//other pages

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth']], function () {

  // Permissions
  Route::delete('permissions/destroy', [PermissionController::class, 'massDestroy'])->name('permissions.massDestroy');
  Route::resource('permissions', PermissionController::class);
  // Roles
  Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
  Route::resource('roles', RolesController::class);
  // Users
  Route::delete('users/destroy', [UsersController::class, 'massDestroy'])->name('users.massDestroy');
  Route::resource('users', UsersController::class);
  // master list route
  Route::get('/real-live-master-list', [App\Http\Controllers\Admin\Master\AdminCreateMasterController::class, 'index'])->name('real-live-master-list');
  // master create route
  Route::get('/real-live-master-create', [App\Http\Controllers\Admin\Master\AdminCreateMasterController::class, 'create'])->name('real-live-master-create');
  // master store route
  Route::post('/real-live-master-store', [App\Http\Controllers\Admin\Master\AdminCreateMasterController::class, 'store'])->name('real-live-master-store');
  // master edit route
  Route::get('/real-live-master-edit/{id}', [App\Http\Controllers\Admin\Master\AdminCreateMasterController::class, 'edit'])->name('real-live-master-edit');
  // master update route
  Route::put('/real-live-master-update/{id}', [App\Http\Controllers\Admin\Master\AdminCreateMasterController::class, 'update'])->name('real-live-master-update');
  // master show route
  Route::get('/real-live-master-show/{id}', [App\Http\Controllers\Admin\Master\AdminCreateMasterController::class, 'show'])->name('real-live-master-show');
  // master delete route
  Route::delete('/real-live-master-delete/{id}', [App\Http\Controllers\Admin\Master\AdminCreateMasterController::class, 'destroy'])->name('real-live-master-delete');
  // real master transfer route
  Route::get('/real-master-transfer/{id}', [App\Http\Controllers\Admin\Master\AdminCreateMasterController::class, 'transfer'])->name('real-master-transfer');
  // store real master transfer route
  Route::post('/real-master-transfer-store', [App\Http\Controllers\Admin\Master\AdminCreateMasterController::class, 'MastertransferStore'])->name('real-master-transfer-store');
  // real master cash out route
  Route::get('/real-master-cash-out/{id}', [App\Http\Controllers\Admin\Master\AdminCreateMasterController::class, 'transferCashOut'])->name('real-master-cash-out');
  // store real master cash out route
  Route::put('/real-master-cash-out-update/{id}', [App\Http\Controllers\Admin\Master\AdminCreateMasterController::class, 'MasterCashOutUpdate'])->name('real-master-cash-out-update');
  // agent list route
  Route::get('/agent-list', [App\Http\Controllers\Admin\Master\MasterController::class, 'index'])->name('agent-list');
  // agent create route
  Route::get('/agent-create', [App\Http\Controllers\Admin\Master\MasterController::class, 'create'])->name('agent-create');
  // agent store route
  Route::post('/agent-store', [App\Http\Controllers\Admin\Master\MasterController::class, 'store'])->name('agent-store');
  // agent edit route
  Route::get('/agent-edit/{id}', [App\Http\Controllers\Admin\Master\MasterController::class, 'edit'])->name('agent-edit');
  // agent update route
  Route::put('/agent-update/{id}', [App\Http\Controllers\Admin\Master\MasterController::class, 'update'])->name('agent-update');
  // agent show route
  Route::get('/agent-show/{id}', [App\Http\Controllers\Admin\Master\MasterController::class, 'show'])->name('agent-show');
  // agent delete route
  Route::delete('/agent-delete/{id}', [App\Http\Controllers\Admin\Master\MasterController::class, 'destroy'])->name('agent-delete');
  // agent transfer route
  Route::get('/agent-transfer/{id}', [App\Http\Controllers\Admin\Master\MasterController::class, 'transfer'])->name('agent-transfer');
  // store agent transfer route
  Route::post('/agent-transfer-store', [App\Http\Controllers\Admin\Master\MasterController::class, 'AgenttransferStore'])->name('agent-transfer-store');
  // agent cash out route
  Route::get('/agent-cash-out/{id}', [App\Http\Controllers\Admin\Master\MasterController::class, 'transferCashOut'])->name('agent-cash-out');
  // store agent cash out route
  Route::put('/agent-cash-out-store/{id}', [App\Http\Controllers\Admin\Master\MasterController::class, 'AgentCashOutStore'])->name('agent-cash-out-store');
    Route::resource('/promotions', PromotionController::class);
  // agent user list route
  Route::get('/agent-user-list', [App\Http\Controllers\Admin\Agent\AgentController::class, 'index'])->name('agent-user-list');
  // agent user create route
  Route::get('/agent-user-create', [App\Http\Controllers\Admin\Agent\AgentController::class, 'create'])->name('agent-user-create');
  // agent user store route
  Route::post('/agent-user-store', [App\Http\Controllers\Admin\Agent\AgentController::class, 'store'])->name('agent-user-store');
  // agent user edit route
  Route::get('/agent-user-edit/{id}', [App\Http\Controllers\Admin\Agent\AgentController::class, 'edit'])->name('agent-user-edit');
  // agent user update route
  Route::put('/agent-user-update/{id}', [App\Http\Controllers\Admin\Agent\AgentController::class, 'update'])->name('agent-user-update');
  // agent user show route
  Route::get('/agent-user-show/{id}', [App\Http\Controllers\Admin\Agent\AgentController::class, 'show'])->name('agent-user-show');
  // agent user delete route
  Route::delete('/agent-user-delete/{id}', [App\Http\Controllers\Admin\Agent\AgentController::class, 'destroy'])->name('agent-user-delete');
  // agent user transfer route
  Route::get('/agent-user-transfer/{id}', [App\Http\Controllers\Admin\Agent\AgentController::class, 'transfer'])->name('agent-user-transfer');
  // store agent user transfer route
  Route::post('/agent-user-transfer-store', [App\Http\Controllers\Admin\Agent\AgentController::class, 'AgentUsertransferStore'])->name('agent-user-transfer-store');
  // agent user cash out route
  Route::get('/agent-user-cash-out/{id}', [App\Http\Controllers\Admin\Agent\AgentController::class, 'transferCashOut'])->name('agent-user-cash-out');
  // store agent user cash out route
  Route::put('/agent-user-cash-out-store/{id}', [App\Http\Controllers\Admin\Agent\AgentController::class, 'AgentUserCashOutStore'])->name('agent-user-cash-out-store');
  // get all transfer log route 
  Route::get('/get-all-admin-to-master-transfer-log', [App\Http\Controllers\Admin\Transfer\TransferLogController::class, 'AdminToMasterTransferLog'])->name('get-all-admin-master-transfer-log');
  // admin daily status transfer log route
  Route::get('/get-all-admin-to-master-daily-status-transfer-log', [App\Http\Controllers\Admin\Transfer\TransferLogController::class, 'AdminToMasterDailyStatusTransferLog'])->name('get-all-admin-master-daily-status-transfer-log');
  // admin monthly status transfer log route
  Route::get('/get-all-admin-to-master-monthly-status-transfer-log', [App\Http\Controllers\Admin\Transfer\TransferLogController::class, 'AdminToMasterMonthlyStatusTransferLog'])->name('get-all-admin-master-monthly-status-transfer-log');
  // get all total daily master to agent transfer log route
  Route::get('/get-all-master-to-agent-daily-status-transfer-log', [App\Http\Controllers\Admin\Transfer\TransferLogController::class, 'MasterToAgentDailyStatusTransferLog'])->name('get-all-master-agent-daily-status-transfer-log');
  // get all total monthly master to agent transfer log route
  Route::get('/get-all-master-to-agent-monthly-status-transfer-log', [App\Http\Controllers\Admin\Transfer\TransferLogController::class, 'MasterToAgentMonthlyStatusTransferLog'])->name('get-all-master-agent-monthly-status-transfer-log');
  // get all total daily agent to user transfer log route
  Route::get('/get-all-agent-to-user-daily-status-transfer-log', [App\Http\Controllers\Admin\Transfer\TransferLogController::class, 'AgentToUserDailyStatusTransferLog'])->name('get-all-agent-user-daily-status-transfer-log');
  // get all total monthly agent to user transfer log route
  Route::get('/get-all-agent-to-user-monthly-status-transfer-log', [App\Http\Controllers\Admin\Transfer\TransferLogController::class, 'AgentToUserMonthlyStatusTransferLog'])->name('get-all-agent-user-monthly-status-transfer-log');
  // get all master to agent transfer log route
  Route::get('/get-all-master-to-agent-transfer-log', [App\Http\Controllers\Admin\Transfer\TransferLogController::class, 'MasterToAgentTransferLog'])->name('get-all-master-agent-transfer-log');
  // get all agent to user transfer log route
  Route::get('/get-all-agent-to-user-transfer-log', [App\Http\Controllers\Admin\Transfer\TransferLogController::class, 'AgentToUserTransferLog'])->name('get-all-agent-user-transfer-log');
  // agent user play early morning 9:30 am route
  Route::get('/agent-user-play-early-morning', [App\Http\Controllers\Admin\Agent\GetEarlyMorning2DPlayUserByAgentController::class, 'playEarlyMorning'])->name('agent-user-play-early-morning');
  // agent user play morning 12:00 pm route
  Route::get('/agent-user-play-morning', [App\Http\Controllers\Admin\Agent\GetEarlyMorning2DPlayUserByAgentController::class, 'playMorning'])->name('agent-user-play-morning');

  // agent user play early evening 12:1 pm route
  Route::get('/agent-user-play-early-evening-digit', [App\Http\Controllers\Admin\Agent\GetEarlyMorning2DPlayUserByAgentController::class, 'playEarlyEvening'])->name('playEarlyEvening');
  // agent user play  evening 4:30 pm route
  Route::get('/agent-user-play-evening-digit', [App\Http\Controllers\Admin\Agent\GetEarlyMorning2DPlayUserByAgentController::class, 'playEvening'])->name('playEvening');

  // agent 3d list route
  Route::get('/agent-three-d-list', [App\Http\Controllers\Admin\Agent\AgentThreeDListController::class, 'index'])->name('agent-three-d-list');
  // agent 3d list show route
  Route::get('/agent-three-d-list-show/{id}', [App\Http\Controllers\Admin\Agent\AgentThreeDListController::class, 'show'])->name('agent-three-d-list-show');

  Route::get('/two-d-users', [App\Http\Controllers\Admin\TwoUsersController::class, 'index'])->name('two-d-users-index');
  // details route
  Route::get('/two-d-users/{id}', [App\Http\Controllers\Admin\TwoUsersController::class, 'show'])->name('two-d-users-details');
  //Banners
  Route::resource('banners', BannerController::class);
  Route::resource('games', GameController::class);
  Route::resource('text', BannerTextController::class);
  // profile resource rotues
  Route::resource('profiles', ProfileController::class);
  // admin update balance route
  Route::put('/super-admin-update-balance/{id}', [App\Http\Controllers\Admin\ProfileController::class, 'AdminUpdateBalance'])->name('admin-update-balance');
  // user profile route get method
  Route::put('/change-password', [ProfileController::class, 'newPassword'])->name('changePassword');
  // PhoneAddressChange route with auth id route with put method
  Route::put('/change-phone-address', [ProfileController::class, 'PhoneAddressChange'])->name('changePhoneAddress');
  Route::put('/change-kpay-no', [ProfileController::class, 'KpayNoChange'])->name('changeKpayNo');
  Route::put('/change-join-date', [ProfileController::class, 'JoinDate'])->name('addJoinDate');
  Route::resource('play-twod', PlayTwoDController::class);
  Route::get('/get-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'GetTwoDigit'])->name('GetTwoDigit');
  Route::post('lotteries-two-d-play', [TwoDigitController::class, 'store'])->name('StorePlayTwoD');
  Route::get('/morning-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'MorningPlayTwoDigit'])->name('MorningPlayTwoDigit');

    Route::get('/evening-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'EveningPlayTwoDigit'])->name('EveningPlayTwoDigit');

    Route::post('lotteries-two-d-play', [TwoDigitController::class, 'store'])->name('StorePlayTwoD');

    Route::get('/get-three-d', [App\Http\Controllers\Admin\ThreeDPlayController::class, 'GetThreeDigit'])->name('GetThreeDigit');
    Route::get('/three-d-play', [App\Http\Controllers\Admin\ThreeDPlayController::class, 'ThreeDigitPlay'])->name('ThreeDigitPlay');
    Route::get('/three-d-play-confirm', [App\Http\Controllers\Admin\ThreeDPlayController::class, 'ThreeDigitPlayConfirm'])->name('ThreeDigitPlayConfirm');
    Route::get('/three-d-play-confirm-api-format', [App\Http\Controllers\Admin\ThreeDPlayController::class, 'ThreeDigitPlayConfirmApi'])->name('ThreeDigitPlayConfirmApi');
    Route::post('/three-digit-play-confirm', [App\Http\Controllers\Admin\ThreeDigitPlayController::class, 'ThreeDigitPlaystore'])->name('ThreeDigitPlaystore');
    Route::post('/two-d-play', [App\Http\Controllers\Admin\TwoDPlayController::class, 'store'])->name('two-d-play.store');

    Route::get('/quick-morning-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'QuickMorningPlayTwoDigit'])->name('QuickMorningPlayTwoDigit');
    Route::get('/quick-odd-morning-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'QuickOddMorningPlayTwoDigit'])->name('QuickOddMorningPlayTwoDigit');
    Route::get('/quick-even-morning-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'QuickEvenMorningPlayTwoDigit'])->name('QuickEvenMorningPlayTwoDigit');

    Route::get('/quick-odd-same-morning-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'QuickOddSameMorningPlayTwoDigit'])->name('QuickOddSameMorningPlayTwoDigit');

    Route::get('/quick-even-same-morning-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'QuickEvenSameMorningPlayTwoDigit'])->name('QuickEvenSameMorningPlayTwoDigit');
    Route::post('/quick-two-d-play', [App\Http\Controllers\Admin\TwoDPlayController::class, 'Quickstore'])->name('Quickstore');
    Route::get('/two-d-play-noti', [App\Http\Controllers\Admin\GetNotificationTwoDPlayUserController::class, 'index'])->name('two-d-play-noti');
    Route::post('/two-d-play-noti-mark-as-read', [App\Http\Controllers\Admin\GetNotificationTwoDPlayUserController::class, 'playTwoDmarkNotification'])->name('playTwoDmarkNotification');

    Route::get('/get-two-d-session-reset', [App\Http\Controllers\Admin\SessionResetControlller::class, 'index'])->name('SessionResetIndex');
    Route::post('/two-d-session-reset', [App\Http\Controllers\Admin\SessionResetControlller::class, 'SessionReset'])->name('SessionReset');
    Route::get('/close-two-d', [App\Http\Controllers\Admin\CloseTwodController::class, 'index'])->name('CloseTwoD');
    Route::put('/update-open-close-two-d', [App\Http\Controllers\Admin\CloseTwodController::class, 'update'])->name('OpenCloseTwoD');
    Route::resource('twod-records', TwoDLotteryController::class);
    Route::resource('tow-d-win-number', TwoDWinnerController::class);
    Route::resource('tow-d-morning-number', TwoDMorningController::class);
    // two d get early morning number
    Route::get('/get-two-d-early-morning-number', [App\Http\Controllers\Admin\TwoDMorningController::class, 'GetDigitEarlMorningindex'])->name('earlymorningNumber');
    Route::get('/get-two-d-early-evening-number', [App\Http\Controllers\Admin\TwoDMorningController::class, 'GetDigitEarlyEveningindex'])->name('earlyeveningNumber');

    // two d get early morning number over amount limit
    Route::get('/get-two-d-early-morning-number-over-amount-limit', [App\Http\Controllers\Admin\TwoDMorningController::class, 'GetDigitEarlyMorningOverAmountLimitindex'])->name('earlymorningNumberOverAmountLimit');
    // two d get 12:1 morning number over amount limit
    Route::get('/get-two-d-morning-number-over-amount-limit', [App\Http\Controllers\Admin\TwoDMorningController::class, 'GetDigitMorningOverAmountLimitindex'])->name('morningNumberOverAmountLimit');
    // two d get 2 early evening number over amount limit
    Route::get('/get-two-d-early-evening-number-over-amount-limit', [App\Http\Controllers\Admin\TwoDMorningController::class, 'GetDigitEarlyEveningOverAmountLimitindex'])->name('earlyeveningNumberOverAmountLimit');
    // two d get 4:30 evening number over amount limit
    Route::get('/get-two-d-evening-number-over-amount-limit', [App\Http\Controllers\Admin\TwoDMorningController::class, 'GetDigitEveningOverAmountLimitindex'])->name('eveningNumberOverAmountLimit');

    // early morning winner
    Route::get('/two-d-early-morning-winner', [App\Http\Controllers\Admin\TwoDMorningWinnerController::class, 'TwoDEarlyMorningWinner'])->name('earlymorningWinner');
    Route::get('/two-d-morning-winner', [App\Http\Controllers\Admin\TwoDMorningWinnerController::class, 'TwoDMorningWinner'])->name('morningWinner');
    Route::get('/two-d-evening-number', [App\Http\Controllers\Admin\TwoDMorningController::class, 'EveningTwoD'])->name('eveningNumber');

    Route::get('/two-d-early-evening-winner', [App\Http\Controllers\Admin\TwoDMorningController::class, 'TwoDEarlyEveningWinner'])->name('earlyeveningWinner');

    Route::get('/two-d-evening-winner', [App\Http\Controllers\Admin\TwoDMorningController::class, 'TwoDEveningWinner'])->name('eveningWinner');
    Route::get('/two-d-evening-winner', [App\Http\Controllers\Admin\TwoDEveningWinnerController::class, 'TwoDEveningWinner'])->name('eveningWinner');
    Route::get('profile/fill_money', [ProfileController::class, 'fillmoney']);
    // kpay fill money get route
    Route::get('profile/kpay_fill_money', [ProfileController::class, 'index'])->name('kpay_fill_money');
    Route::resource('fill-balance-replies', FillBalanceReplyController::class);
    Route::get('/daily-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmounts'])->name('dailyIncomeJson');
    Route::get('/with-draw-view', [App\Http\Controllers\Admin\WithDrawViewController::class, 'index'])->name('withdrawViewGet');
    Route::get('/with-draw-details/{id}', [App\Http\Controllers\Admin\WithDrawViewController::class, 'show'])->name('withdrawViewDetails');
    // withdraw update route
    Route::put('/with-draw-update/{id}', [App\Http\Controllers\Admin\WithDrawViewController::class, 'update'])->name('withdrawViewUpdate');
    Route::get('/daily-with-name-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmountsDaily'])->name('getTotalAmountsDaily');
    // week name route
    Route::get('/weekly-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmountsWeekly'])->name('getTotalAmountsWeekly');
    // month name route
    Route::get('/month-with-name-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmountsMonthly'])->name('getTotalAmountsMonthly');
    // year name route
    Route::get('/yearly-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmountsYearly'])->name('getTotalAmountsYearly');

    // 3d lottery routes
    // 3d daily income
    Route::get('/threed-lotteries-daily-income', [DailyThreeDIncomeOutComeController::class, 'getTotalAmountsDaily']);
    // 3d daily income weekly
    Route::get('/threed-lotteries-daily-income-money', [DailyThreeDIncomeOutComeController::class, 'getTotalAmounts']);

    // 3d daily income monthly
    Route::get('/threed-lotteries-daily-income-monthly', [DailyThreeDIncomeOutComeController::class, 'getTotalAmountsMonthly']);

    Route::get('/threed-lotteries-match-time', [ThreedMatchTimeController::class, 'index']);
    // 3d prize number create
    Route::get('/three-d-prize-number-create', [App\Http\Controllers\Admin\ThreeD\ThreeDPrizeNumberCreateController::class, 'index'])->name('three-d-prize-number-create');
    Route::post('/three-d-prize-number-create', [App\Http\Controllers\Admin\ThreeD\ThreeDPrizeNumberCreateController::class, 'store'])->name('three-d-prize-number-create.store');

    // 3d history
    Route::get('/three-d-history', [App\Http\Controllers\Admin\ThreeD\ThreeDRecordHistoryController::class, 'index'])->name('three-d-history');
    // 3d history show
    Route::get('/three-d-history-show/{id}', [App\Http\Controllers\Admin\ThreeD\ThreeDRecordHistoryController::class, 'show'])->name('three-d-history-show');
    // three d list index
    Route::get('/three-d-list-index', [App\Http\Controllers\Admin\ThreeD\ThreeDListController::class, 'index'])->name('three-d-list-index');
    // three d list show
    Route::get('/three-d-list-show/{id}', [App\Http\Controllers\Admin\ThreeD\ThreeDListController::class, 'show'])->name('three-d-list-show');
    // 3d winner list
    Route::get('/three-d-winner', [App\Http\Controllers\Admin\ThreeD\ThreeDWinnerController::class, 'index'])->name('three-d-winner');

        // Permissions
        // Route::delete('permissions/destroy', [PermissionController::class, 'massDestroy'])->name('permissions.massDestroy');
        // Route::resource('permissions', PermissionController::class);
        // // Roles
        // Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
        // Route::resource('roles', RolesController::class);
        // // Users
        // Route::delete('users/destroy', [UsersController::class, 'massDestroy'])->name('users.massDestroy');
        // Route::resource('users', UsersController::class);
        Route::get('/two-d-users', [App\Http\Controllers\Admin\TwoUsersController::class, 'index'])->name('two-d-users-index');
        // details route
        Route::get('/two-d-users/{id}', [App\Http\Controllers\Admin\TwoUsersController::class, 'show'])->name('two-d-users-details');
        //Banners
        Route::resource('banners', BannerController::class);
        // profile resource rotues
        Route::resource('profiles', ProfileController::class);
        // user profile route get method
        Route::put('/change-password', [ProfileController::class, 'newPassword'])->name('changePassword');
        // PhoneAddressChange route with auth id route with put method
        Route::put('/change-phone-address', [ProfileController::class, 'PhoneAddressChange'])->name('changePhoneAddress');
        Route::put('/change-kpay-no', [ProfileController::class, 'KpayNoChange'])->name('changeKpayNo');
        Route::put('/change-join-date', [ProfileController::class, 'JoinDate'])->name('addJoinDate');
        Route::resource('play-twod', PlayTwoDController::class);
        Route::get('/get-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'GetTwoDigit'])->name('GetTwoDigit');
        Route::post('lotteries-two-d-play', [TwoDigitController::class, 'store'])->name('StorePlayTwoD');
        Route::get('/morning-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'MorningPlayTwoDigit'])->name('MorningPlayTwoDigit');

        Route::get('/evening-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'EveningPlayTwoDigit'])->name('EveningPlayTwoDigit');

        Route::post('lotteries-two-d-play', [TwoDigitController::class, 'store'])->name('StorePlayTwoD');
        Route::post('/two-d-play', [App\Http\Controllers\Admin\TwoDPlayController::class, 'store'])->name('two-d-play.store');

        Route::get('/quick-morning-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'QuickMorningPlayTwoDigit'])->name('QuickMorningPlayTwoDigit');
        Route::get('/quick-odd-morning-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'QuickOddMorningPlayTwoDigit'])->name('QuickOddMorningPlayTwoDigit');
        Route::get('/quick-even-morning-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'QuickEvenMorningPlayTwoDigit'])->name('QuickEvenMorningPlayTwoDigit');

        Route::get('/quick-odd-same-morning-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'QuickOddSameMorningPlayTwoDigit'])->name('QuickOddSameMorningPlayTwoDigit');

        Route::get('/quick-even-same-morning-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'QuickEvenSameMorningPlayTwoDigit'])->name('QuickEvenSameMorningPlayTwoDigit');
        Route::post('/quick-two-d-play', [App\Http\Controllers\Admin\TwoDPlayController::class, 'Quickstore'])->name('Quickstore');
        Route::get('/two-d-play-noti', [App\Http\Controllers\Admin\GetNotificationTwoDPlayUserController::class, 'index'])->name('two-d-play-noti');
        Route::post('/two-d-play-noti-mark-as-read', [App\Http\Controllers\Admin\GetNotificationTwoDPlayUserController::class, 'playTwoDmarkNotification'])->name('playTwoDmarkNotification');

        Route::get('/get-two-d-session-reset', [App\Http\Controllers\Admin\SessionResetControlller::class, 'index'])->name('SessionResetIndex');
        Route::post('/two-d-session-reset', [App\Http\Controllers\Admin\SessionResetControlller::class, 'SessionReset'])->name('SessionReset');

        Route::post('/two-d-session-over-amount-limit-reset', [App\Http\Controllers\Admin\SessionResetControlller::class, 'OverAmountLimitSessionReset'])->name('OverAmountLimitSessionReset');
        // three d reset
        Route::post('/three-d-reset', [App\Http\Controllers\Admin\ThreeD\ThreeDResetController::class, 'ThreeDReset'])->name('ThreeDReset');

        Route::get('/close-two-d', [App\Http\Controllers\Admin\CloseTwodController::class, 'index'])->name('CloseTwoD');
        Route::put('/update-open-close-two-d', [App\Http\Controllers\Admin\CloseTwodController::class, 'update'])->name('OpenCloseTwoD');
        Route::get('/two-d-evening-number', [App\Http\Controllers\Admin\TwoDMorningController::class, 'EveningTwoD'])->name('eveningNumber');
        Route::get('/two-d-evening-winner', [App\Http\Controllers\Admin\TwoDMorningController::class, 'TwoDEveningWinner'])->name('eveningWinner');
        Route::get('/two-d-evening-winner', [App\Http\Controllers\Admin\TwoDEveningWinnerController::class, 'TwoDEveningWinner'])->name('eveningWinner');
        Route::get('profile/fill_money', [ProfileController::class, 'fillmoney']);
        // kpay fill money get route
        Route::get('profile/kpay_fill_money', [ProfileController::class, 'index'])->name('kpay_fill_money');
        Route::resource('fill-balance-replies', FillBalanceReplyController::class);
        Route::get('/daily-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmounts'])->name('dailyIncomeJson');
        Route::get('/with-draw-view', [App\Http\Controllers\Admin\WithDrawViewController::class, 'index'])->name('withdrawViewGet');
        Route::get('/with-draw-details/{id}', [App\Http\Controllers\Admin\WithDrawViewController::class, 'show'])->name('withdrawViewDetails');
        // withdraw update route
        Route::put('/with-draw-update/{id}', [App\Http\Controllers\Admin\WithDrawViewController::class, 'update'])->name('withdrawViewUpdate');
        Route::get('/daily-with-name-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmountsDaily'])->name('getTotalAmountsDaily');
        // week name route
        Route::get('/weekly-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmountsWeekly'])->name('getTotalAmountsWeekly');
        // month name route
        Route::get('/month-with-name-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmountsMonthly'])->name('getTotalAmountsMonthly');
        // year name route
        Route::get('/yearly-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmountsYearly'])->name('getTotalAmountsYearly');

        // 3d lottery routes
        Route::get('/threed-lotteries-history', [ThreedHistoryController::class, 'index']);
        Route::get('/threed-lotteries-match-time', [ThreedMatchTimeController::class, 'index']);

});


Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'App\Http\Controllers\User', 'middleware' => ['auth']], function () {

    //profile management
    Route::put('editProfile/{profile}', [ProfileController::class, 'update'])->name('editProfile');
    Route::post('editInfo', [ProfileController::class, 'editInfo'])->name('editInfo');
    Route::post('changePassword', [ProfileController::class, 'changePassword'])->name('changePassword');
    //profile management



    Route::get('/dashboard', [App\Http\Controllers\User\WelcomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/two-d-play-index', [App\Http\Controllers\User\TwodPlayIndexController::class, 'index'])->name('twod-play-index');
    // 9:00 am index
    Route::get('/two-d-play-index-simple', [App\Http\Controllers\User\AM9\TwoDplay9AMController::class, 'index'])->name('twod-play-index-9am');
    // 9:00 am confirm page
    Route::get('/two-d-play-9-30-early-morning-confirm', [App\Http\Controllers\User\AM9\TwoDplay9AMController::class, 'play_confirm'])->name('twod-play-confirm-9am');
    // store
    Route::post('/two-d-play-index-9am', [App\Http\Controllers\User\AM9\TwoDplay9AMController::class, 'store'])->name('twod-play-index-9am.store');
    // 12:00 pm index
    Route::get('/two-d-play-index-12pm', [App\Http\Controllers\User\PM12\TwodPlay12PMController::class, 'index'])->name('twod-play-index-12pm');
    // 12:00 pm confirm page
    Route::get('/two-d-play-12-1-morning-confirm', [App\Http\Controllers\User\PM12\TwodPlay12PMController::class, 'play_confirm'])->name('twod-play-confirm-12pm');
    // store
    Route::post('/two-d-play-index-12pm', [App\Http\Controllers\User\PM12\TwodPlay12PMController::class, 'store'])->name('twod-play-index-12pm.store');
    // 2:00 pm index
    Route::get('/two-d-play-index-2pm', [App\Http\Controllers\User\PM2\TwodPlay2PMController::class, 'index'])->name('twod-play-index-2pm');
    // 2:00 pm confirm page
    Route::get('/two-d-play-2-early-evening-confirm', [App\Http\Controllers\User\PM2\TwodPlay2PMController::class, 'play_confirm'])->name('twod-play-confirm-2pm');
    // store
    Route::post('/two-d-play-index-2pm', [App\Http\Controllers\User\PM2\TwodPlay2PMController::class, 'store'])->name('twod-play-index-2pm.store');
    // 4:00 pm index
    Route::get('/two-d-play-index-4pm', [App\Http\Controllers\User\PM4\TwodPlay4PMController::class, 'index'])->name('twod-play-index-4pm');
    // 2:00 pm confirm page
    Route::get('/two-d-play-4-30-evening-confirm', [App\Http\Controllers\User\PM4\TwodPlay4PMController::class, 'play_confirm'])->name('twod-play-confirm-4pm');
    // store
    Route::post('/two-d-play-index-4pm', [App\Http\Controllers\User\PM4\TwodPlay4PMController::class, 'store'])->name('twod-play-index-4pm.store');

    // qick play 9:00 am index
    Route::get('/two-d-quick-play-index', [App\Http\Controllers\User\TwodQuick\TwoDQicklyPlayController::class, 'index'])->name('twod-quick-play-index');
    Route::get('/two-d-play-quick-confirm', [App\Http\Controllers\User\TwodQuick\TwoDQicklyPlayController::class, 'play_confirm'])->name('twod-play-confirm-quick');
    // store
    Route::post('/twod-play-quick-confirm', [App\Http\Controllers\User\TwodQuick\TwoDQicklyPlayController::class, 'store'])->name('twod-play-quickly-confirm.store');


    // money transfer
    Route::get('/wallet-deposite', [App\Http\Controllers\User\FillBalance\FillBalanceController::class, 'index'])->name('deposite-wallet');
    Route::get('/fill-balance', [App\Http\Controllers\User\FillBalance\FillBalanceController::class, 'topUpWallet'])->name('topUpWallet');
    Route::get('/kpay-fill-balance-top-up-submit', [App\Http\Controllers\User\FillBalance\FillBalanceController::class, 'topUpSubmit'])->name('topUpSubmit');
    Route::get('/cb-pay-fill-balance-top-up-submit', [App\Http\Controllers\User\FillBalance\FillBalanceController::class, 'CBPaytopUpSubmit'])->name('CBPaytopUpSubmit');
    Route::get('/wave-pay-fill-balance-top-up-submit', [App\Http\Controllers\User\FillBalance\FillBalanceController::class, 'WavePaytopUpSubmit'])->name('WavePaytopUpSubmit');
    Route::get('/aya-pay-fill-balance-top-up-submit', [App\Http\Controllers\User\FillBalance\FillBalanceController::class, 'AYAPaytopUpSubmit'])->name('AYAPaytopUpSubmit');
    Route::post('/user-kpay-fill-money', [FillBalanceController::class, 'StoreKpayFillMoney'])->name('StoreKpayFillMoney');
    Route::post('/user-cb-pay-fill-money', [FillBalanceController::class, 'StoreCBpayFillMoney'])->name('StoreCBpayFillMoney');
    Route::post('/user-wave-pay-fill-money', [FillBalanceController::class, 'StoreWavepayFillMoney'])->name('StoreWavepayFillMoney');
    Route::post('/user-aya-pay-fill-money', [FillBalanceController::class, 'StoreAYApayFillMoney'])->name('StoreAYApayFillMoney');
    //withdraw
    Route::get('/withdraw-money', [App\Http\Controllers\User\WithDraw\WithDrawController::class, 'GetWithdraw'])->name('money-withdraw');
    Route::get('k-pay-withdraw-money', [WithDrawController::class, 'UserKpayWithdrawMoney'])->name('UserKpayWithdrawMoney');
    Route::post('k-pay-with-draw-money', [WithDrawController::class, 'StoreKpayWithdrawMoney'])->name('StoreKpayWithdrawMoney');
    Route::get('cb-pay-withdraw-money', [WithDrawController::class, 'UserCBPayWithdrawMoney'])->name('UserCBPayWithdrawMoney');
    Route::post('cb-pay-with-draw-money', [WithDrawController::class, 'StoreCBpayWithdrawMoney'])->name('StoreCBpayWithdrawMoney');
    Route::get('wave-pay-withdraw-money', [WithDrawController::class, 'UserWavePayWithdrawMoney'])->name('UserWavePayWithdrawMoney');
    Route::post('wave-pay-with-draw-money', [WithDrawController::class, 'StoreWavepayWithdrawMoney'])->name('StoreWavepayWithdrawMoney');
    Route::get('aya-pay-withdraw-money', [WithDrawController::class, 'UserAYAPayWithdrawMoney'])->name('UserAYAPayWithdrawMoney');
    Route::post('aya-pay-with-draw-money', [WithDrawController::class, 'StoreAYApayWithdrawMoney'])->name('StoreAYApayWithdrawMoney');
    // money transfer end

    // two d winner history
    Route::get('/two-d-winners-history', [App\Http\Controllers\User\WinHistory\TwoDWinnerHistoryController::class, 'winnerHistory'])->name('winnerHistory');

    // twod-dream-book
    Route::get('/two-d-dream-book', [App\Http\Controllers\User\Dream\TwodDreamBookController::class, 'index'])->name('two-d-dream-book-index');

    // three d
    Route::get('/three-d-play-index', [ThreeDPlayController::class, 'index'])->name('three-d-play-index');
    // three d choice play
    Route::get('/three-d-choice-play-index', [ThreeDPlayController::class, 'choiceplay'])->name('three-d-choice-play');
    // three d choice play confirm
    Route::get('/three-d-choice-play-confirm', [ThreeDPlayController::class, 'confirm_play'])->name('three-d-choice-play-confirm');
    // three d choice play store
    Route::post('/three-d-choice-play-store', [ThreeDPlayController::class, 'store'])->name('three-d-choice-play-store');
    // display three d play
    Route::get('/three-d-display', [ThreeDPlayController::class, 'user_play'])->name('display');
    // three d dream book
    Route::get('/three-d-dream-book', [App\Http\Controllers\User\Threed\ThreeDreamBookController::class, 'index'])->name('three-d-dream-book-index');
    // three d winner history
    Route::get('/three-d-winners-history', [App\Http\Controllers\User\Threed\ThreedWinnerHistoryController::class, 'index'])->name('three-d-winners-history');

});