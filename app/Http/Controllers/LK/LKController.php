<?php

namespace App\Http\Controllers\LK;

use App\Http\Requests\LK\IdentSettingsRequest;
use App\Http\Requests\LK\MakeSharedWalletRequest;
use App\Http\Requests\LK\MakeWalletRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Wallet;

class LKController extends Controller
{
    public function __construct() {

        $this->middleware('lk_auth');

    }

    public function showMainPage()
    {

        $user = new User;

        $wallet = $user->getPersonalWallet();

        $trans = $user->getTransactions();



        return view('personal-wallet')->with([
            'wallet' => $wallet,
            'transactions' => $trans['transactions'],
            'transCount' => $trans['count'],
            'transCountAll' => $trans['countAll'],
        ]);

    }

    public function showAddWallet()
    {

        return view('add-wallet');

    }

    public function showNewWallet()
    {

        return view('new-wallet');

    }

    public function makePersonalWallet(MakeWalletRequest $request)
    {

        $wallName = $request->input('wallet_name');

        $userId = (new User)->getCurrentUserModel()->id;

        $wallet = (new Wallet)->make($userId,$wallName);

        return back()->with('wallet',$wallet);

    }

    public function makeSharedlWallet(MakeSharedWalletRequest $request)
    {

        $wallName = $request->input('wallet_name');

        $userName = $request->input('user_name');

        $userId = (new User)->getCurrentUserModel()->id;

        $wallet = (new Wallet)->make($userId,$wallName);

        return back()->with('wallet',$wallet);

    }

    public function showWalletSettings()
    {
        return view('options-purse');
    }

    public function showWalletIdentification()
    {
        return view('Identification');
    }

    public function saveIdentSettings(IdentSettingsRequest $request)
    {
        $input = $request->all();

        return back()->with('data',true);
    }


}
