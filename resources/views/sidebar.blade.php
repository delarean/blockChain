<div class="col-lg-2 lk-sidebar">
    <div class="top-logo">
        <a href="#"><img src="{{asset('images/lk/lk-logo.png')}}" alt=""></a>
    </div>

    <ul>
        <li><a href="{{route('wallet')}}" class="wallet-ico">
                <h5>Личный кошелек</h5>
            </a></li>
        <li><a href="{{route('addWallet')}}" class="add-ico">
                <h5>Добавить кошелек</h5>
                <span>Создать, присоединиться или импортировать</span>
            </a></li>
        <li><a href="{{route('walletSettings')}}" class="options-ico">
                <h5>параметры</h5>
                <span>Глобальные параметры</span>
            </a></li>
        <li><a href="installments.blade.php" class="installments-ico">
                <h5>Рассрочка</h5>
            </a></li>
        <li><a href="lk.blade.php" class="history-loans-ico">
                <h5>История займов и погашений</h5>
            </a></li>
    </ul>
</div>