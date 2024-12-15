@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp

@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @php
                $kyc = getContent('kyc.content', true);
            @endphp
            @if (auth()->user()->kv == Status::KYC_UNVERIFIED && auth()->user()->kyc_rejection_reason)
                <div class="alert alert--danger mb-4" role="alert">
                    <div class="d-flex justify-content-between">
                        <h4 class="alert-heading">@lang('KYC Documents Rejected')</h4>
                        <button class="btn btn-outline-secondary " data-bs-toggle="modal" data-bs-target="#kycRejectionReason">@lang('Show Reason')</button>
                    </div>
                    <hr>
                    <p class="mb-0">{{ __(@$kyc->data_values->reject) }} <a href="{{ route('user.kyc.form') }}">@lang('Click Here to Re-submit Documents')</a>.</p>
                    <br>
                    <a href="{{ route('user.kyc.data') }}">@lang('See KYC Data')</a>
                </div>
            @elseif(auth()->user()->kv == Status::KYC_UNVERIFIED)
                <div class="alert alert--info mb-4" role="alert">
                    <h5 class="alert-heading">@lang('KYC Verification required')</h5>
                    <hr>
                    <p class="mb-0">{{ __(@$kyc->data_values->required) }} <a href="{{ route('user.kyc.form') }}">@lang('Click Here to Submit Documents')</a></p>
                </div>
            @elseif(auth()->user()->kv == Status::KYC_PENDING)
                <div class="alert alert--warning mb-4" role="alert">
                    <h4 class="alert-heading">@lang('KYC Verification pending')</h4>
                    <hr>
                    <p class="mb-0">{{ __(@$kyc->data_values->pending) }} <a href="{{ route('user.kyc.data') }}">@lang('See KYC Data')</a></p>
                </div>
            @endif
        </div>
        <div class="">
            <div class="row gy-4 justify-content-center">
                <div class="col-12">
                    <!-- Dashboard Card Start -->
                    <div class="row gy-4 dashboard-widget-wrapper">
                        <div class="col-xxl-3 col-sm-6 col-xsm-6">
                            <div class="dashboard-widget flex-align style-warning">
                                <a href="#" class="link-to-go"></a>
                                <div class="dashboard-widget__icon flex-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none">
                                        <path
                                            d="M4 28V40C4 42.626 8.025 44 12 44C15.975 44 20 42.626 20 40V28C20 22.748 4 22.748 4 28ZM18 36C18 36.705 15.7225 38 12 38C8.2775 38 6 36.705 6 36V34.704C7.86837 35.6073 9.92536 36.0517 12 36C14.0746 36.0517 16.1316 35.6073 18 34.704V36ZM18 32C18 32.705 15.7225 34 12 34C8.2775 34 6 32.705 6 32V30.704C7.86837 31.6073 9.92536 32.0517 12 32C14.0746 32.0517 16.1316 31.6073 18 30.704V32ZM12 26C15.7225 26 18 27.295 18 28C18 28.705 15.7225 30 12 30C8.2775 30 6 28.705 6 28C6 27.295 8.2775 26 12 26ZM12 42C8.2775 42 6 40.705 6 40V38.704C7.86837 39.6073 9.92536 40.0517 12 40C14.0746 40.0517 16.1316 39.6073 18 38.704V40C18 40.705 15.7225 42 12 42Z" />
                                        <path
                                            d="M34.4754 10.749L37.1194 5.4465C37.1954 5.2941 37.2313 5.1248 37.2236 4.95465C37.2158 4.7845 37.1648 4.61915 37.0753 4.47426C36.9857 4.32938 36.8606 4.20977 36.7119 4.12677C36.5632 4.04377 36.3957 4.00013 36.2254 4H24.2254C24.0547 3.99988 23.8869 4.04342 23.7379 4.12649C23.5888 4.20956 23.4635 4.32939 23.3738 4.47458C23.2842 4.61976 23.2332 4.78548 23.2256 4.95595C23.2181 5.12642 23.2544 5.29599 23.3309 5.4485L25.9489 10.6705C21.2959 12.167 17.6814 16.176 16.4739 21.624C16.4165 21.883 16.4643 22.1541 16.6067 22.3779C16.7491 22.6017 16.9745 22.7598 17.2334 22.8175C17.3617 22.8473 17.4947 22.8512 17.6246 22.8289C17.7544 22.8067 17.8786 22.7588 17.9897 22.6881C18.1008 22.6173 18.1967 22.5251 18.2718 22.4168C18.3469 22.3085 18.3996 22.1864 18.4269 22.0575C19.7584 16.042 24.4104 12 30.0004 12C36.9534 12 42.0004 17.8875 42.0004 26V35C41.9991 36.3257 41.4719 37.5967 40.5345 38.5341C39.5971 39.4715 38.3261 39.9987 37.0004 40H23.0004C22.7352 40 22.4808 40.1054 22.2933 40.2929C22.1057 40.4804 22.0004 40.7348 22.0004 41C22.0004 41.2652 22.1057 41.5196 22.2933 41.7071C22.4808 41.8946 22.7352 42 23.0004 42H37.0004C38.8562 41.9977 40.6354 41.2595 41.9476 39.9473C43.2599 38.635 43.9981 36.8558 44.0004 35V26C44.0004 18.5425 40.1869 12.738 34.4754 10.749ZM27.9429 10.184L25.8444 6H34.6094L32.4959 10.238C31.6729 10.0837 30.8377 10.004 30.0004 10C29.3108 10.0081 28.6229 10.0696 27.9429 10.184Z" />
                                        <path
                                            d="M31 30H27C26.7348 30 26.4804 30.1054 26.2929 30.2929C26.1054 30.4804 26 30.7348 26 31C26 31.2652 26.1054 31.5196 26.2929 31.7071C26.4804 31.8946 26.7348 32 27 32H29V33C29 33.2652 29.1054 33.5196 29.2929 33.7071C29.4804 33.8946 29.7348 34 30 34C30.2652 34 30.5196 33.8946 30.7071 33.7071C30.8946 33.5196 31 33.2652 31 33V32C31.7956 32 32.5587 31.6839 33.1213 31.1213C33.6839 30.5587 34 29.7956 34 29C34 28.2044 33.6839 27.4413 33.1213 26.8787C32.5587 26.3161 31.7956 26 31 26H29C28.7348 26 28.4804 25.8946 28.2929 25.7071C28.1054 25.5196 28 25.2652 28 25C28 24.7348 28.1054 24.4804 28.2929 24.2929C28.4804 24.1054 28.7348 24 29 24H33C33.2652 24 33.5196 23.8946 33.7071 23.7071C33.8946 23.5196 34 23.2652 34 23C34 22.7348 33.8946 22.4804 33.7071 22.2929C33.5196 22.1054 33.2652 22 33 22H31V21C31 20.7348 30.8946 20.4804 30.7071 20.2929C30.5196 20.1054 30.2652 20 30 20C29.7348 20 29.4804 20.1054 29.2929 20.2929C29.1054 20.4804 29 20.7348 29 21V22C28.2044 22 27.4413 22.3161 26.8787 22.8787C26.3161 23.4413 26 24.2044 26 25C26 25.7956 26.3161 26.5587 26.8787 27.1213C27.4413 27.6839 28.2044 28 29 28H31C31.2652 28 31.5196 28.1054 31.7071 28.2929C31.8946 28.4804 32 28.7348 32 29C32 29.2652 31.8946 29.5196 31.7071 29.7071C31.5196 29.8946 31.2652 30 31 30Z" />
                                    </svg>
                                </div>
                                <div class="dashboard-widget__content">
                                    <span class="dashboard-widget__text">@lang('Current Balance')</span>
                                    <h4 class="dashboard-widget__number">{{ showAmount($user->balance) }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-sm-6 col-xsm-6">
                            <div class="dashboard-widget flex-align style-success">
                                <a href="#" class="link-to-go"></a>
                                <div class="dashboard-widget__icon flex-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none">
                                        <path
                                            d="M43.4965 22.8709C42.5201 21.9561 41.1766 21.6743 39.9685 21.9997C40.123 16.7116 37.1725 11.5525 32.6811 8.81366L34.1686 3.30758C34.1974 3.20077 34.2012 3.08878 34.1798 2.98026C34.1584 2.87173 34.1124 2.76957 34.0453 2.68166C33.9778 2.59407 33.8911 2.52312 33.7919 2.47427C33.6927 2.42543 33.5837 2.39998 33.4731 2.3999H25.2301C25.1195 2.40001 25.0105 2.42554 24.9115 2.47452C24.8124 2.5235 24.7259 2.59461 24.6587 2.68236C24.5915 2.7701 24.5454 2.87213 24.524 2.98055C24.5025 3.08896 24.5063 3.20086 24.535 3.30758L26.0177 8.8103C21.5014 11.5708 18.7184 16.4092 18.7184 21.5793C18.7184 22.5647 18.8168 23.5204 19.0102 24.4804H18.7453C17.6526 24.4805 16.6024 24.9033 15.8144 25.6602L12.5557 28.7797C12.1106 28.5463 11.6153 28.425 11.1128 28.4265C10.3038 28.4242 9.52637 28.7406 8.94894 29.3073L4.78302 33.3853C4.19358 33.9618 3.86478 34.7356 3.85566 35.5641C3.84654 36.3925 4.1595 37.173 4.7355 37.7615L11.5011 44.6735C11.7885 44.9684 12.1323 45.2024 12.5121 45.3615C12.8918 45.5207 13.2997 45.6018 13.7115 45.5999C14.5204 45.6027 15.2979 45.2866 15.8753 44.7201L20.0413 40.6425C20.3322 40.3588 20.564 40.0202 20.7232 39.6463C20.8824 39.2724 20.9658 38.8706 20.9686 38.4642C20.9741 37.9822 20.8666 37.5056 20.6547 37.0727L20.8174 36.9393C21.6368 36.3325 22.6073 35.9999 23.624 35.9999H30.0406C31.6616 35.9999 33.2432 35.4532 34.4941 34.4394L38.0667 31.5546C38.2064 31.461 38.3408 31.3564 38.4771 31.2268L38.4896 31.2153C38.5093 31.1961 38.5304 31.1812 38.5496 31.161L43.591 25.7869C43.9482 25.4043 44.1465 24.9001 44.1459 24.3767C44.1446 24.0949 44.0864 23.8163 43.9748 23.5576C43.8632 23.2988 43.7005 23.0653 43.4965 22.8709ZM20.1579 21.6825C20.1579 16.9065 22.7989 12.4799 27.0569 10.0799H28.7101C28.901 10.0799 29.0842 10.004 29.2192 9.86902C29.3542 9.73399 29.4301 9.55086 29.4301 9.3599C29.4301 9.16895 29.3542 8.98581 29.2192 8.85079C29.0842 8.71576 28.901 8.6399 28.7101 8.6399H27.4069L26.1699 3.8399H32.5333L31.2925 8.6399H31.2032C31.0122 8.6399 30.8291 8.71576 30.6941 8.85079C30.559 8.98581 30.4832 9.16895 30.4832 9.3599C30.4832 9.55086 30.559 9.73399 30.6941 9.86902C30.8291 10.004 31.0122 10.0799 31.2032 10.0799H31.6361C35.8981 12.4799 38.5414 16.9089 38.5414 21.6892C38.5414 22.0962 38.5165 22.4495 38.4781 22.8489C38.3907 22.9261 38.3053 22.9809 38.2237 23.0673L35.8189 25.6204L35.2933 25.9309C35.2899 25.9329 35.2875 25.9324 35.2846 25.9343C35.2808 25.9367 35.2765 25.9362 35.2726 25.9386L33.6781 26.9735C33.4259 26.6917 33.1172 26.4662 32.7721 26.3117C32.427 26.1572 32.0532 26.0772 31.675 26.0769L26.1325 26.0783L24.991 25.2666C24.2773 24.7557 23.4217 24.4806 22.544 24.4799H20.4891C20.2736 23.5199 20.1579 22.6722 20.1579 21.6825ZM19.0342 39.6129L14.8683 43.6905C14.2395 44.3053 13.1432 44.2933 12.5293 43.6655L5.76414 36.754C5.61209 36.5989 5.49231 36.4152 5.41173 36.2135C5.33115 36.0118 5.29138 35.7961 5.2947 35.5789C5.29606 35.3618 5.34041 35.1472 5.42519 34.9473C5.50996 34.7474 5.63348 34.5663 5.78862 34.4145L9.95454 30.3369C10.2641 30.0345 10.6745 29.8674 11.1113 29.8674C11.5621 29.8674 11.9821 30.0431 12.2941 30.3613L19.0592 37.2729C19.3669 37.5868 19.5329 38.0039 19.5286 38.4479C19.5274 38.6651 19.4831 38.88 19.3982 39.0799C19.3133 39.2799 19.1896 39.4611 19.0342 39.6129ZM42.5389 24.8034L37.5325 30.1405L37.1432 30.4554C37.1225 30.4713 37.1014 30.4866 37.0832 30.5039L33.5878 33.3205C32.5918 34.1274 31.3323 34.5599 30.0406 34.5599H23.624C22.315 34.5599 21.0142 35.0015 19.9587 35.7834L19.7672 35.9322L13.6697 29.7057L16.8085 26.6994C17.3291 26.1994 18.0229 25.92 18.7448 25.9199H22.544C23.1231 25.9238 23.6869 26.1059 24.1587 26.4417L25.4883 27.3829L25.495 27.3882C25.5214 27.4065 25.5502 27.4213 25.5785 27.4362C25.592 27.4429 25.6049 27.4525 25.6189 27.4588C25.6424 27.4689 25.6673 27.4751 25.6918 27.4828C25.7125 27.489 25.7331 27.4977 25.7542 27.502C25.7705 27.5053 25.7873 27.5053 25.8041 27.5077C25.8349 27.5121 25.8661 27.5169 25.8968 27.5173L25.9035 27.5178L31.675 27.5159C32.3691 27.5159 32.9336 28.1836 32.9336 28.8777C32.9336 29.5717 32.3696 30.2399 31.675 30.2399H25.0467C24.8557 30.2399 24.6726 30.3158 24.5376 30.4508C24.4026 30.5858 24.3267 30.7689 24.3267 30.9599C24.3267 31.1509 24.4026 31.334 24.5376 31.469C24.6726 31.604 24.8557 31.6799 25.0467 31.6799H31.6755C33.1635 31.6799 34.3741 30.3657 34.3741 28.8781C34.3741 28.7053 34.3563 28.485 34.3251 28.3213L36.0526 27.1737L36.6435 26.8041C36.6958 26.7724 36.7409 26.7273 36.7822 26.6855L36.7985 26.6706L39.2729 24.0292C40.1384 23.1095 41.5918 23.062 42.5057 23.9178C42.6266 24.0314 42.6979 24.1881 42.7041 24.3538C42.7103 24.5196 42.6509 24.6811 42.5389 24.8034Z" />
                                        <path
                                            d="M17.1014 40.0894C17.8591 40.0894 18.4733 39.4752 18.4733 38.7175C18.4733 37.9599 17.8591 37.3457 17.1014 37.3457C16.3438 37.3457 15.7296 37.9599 15.7296 38.7175C15.7296 39.4752 16.3438 40.0894 17.1014 40.0894Z" />
                                        <path
                                            d="M29.1996 19.8543L29.2802 19.8533C29.5908 19.8533 29.887 20.0036 30.0713 20.2551C30.2537 20.5042 30.3041 20.8196 30.2095 21.1201C30.1582 21.2788 30.0669 21.4217 29.9446 21.5352C29.8222 21.6486 29.6728 21.7288 29.5106 21.7681C29.4373 21.7848 29.3622 21.7934 29.287 21.7935C28.8612 21.7935 28.4863 21.5247 28.3529 21.1249C28.304 20.9817 28.2111 20.8577 28.0877 20.7703C27.9642 20.6829 27.8163 20.6367 27.665 20.6381C27.4289 20.6381 27.2038 20.7529 27.0636 20.9458C26.9273 21.134 26.779 21.3658 26.8495 21.5818C27.091 22.3273 27.8402 22.91 28.3202 23.1471V23.8825C28.3202 24.2861 28.8766 24.6145 29.2802 24.6145C29.6839 24.6145 30.2402 24.2861 30.2402 23.8825V23.1471C30.7202 22.9301 31.3697 22.4175 31.6457 21.7681C31.9591 21.0303 31.8305 20.1217 31.3898 19.3455C31.0236 18.6999 30.2254 18.2401 29.3518 18.2401H29.2798C28.9529 18.2401 28.6486 18.1489 28.4647 17.87C28.2823 17.593 28.254 17.293 28.3865 16.9815C28.5079 16.6978 28.7695 16.5015 29.0686 16.4396C29.1358 16.4257 29.2044 16.4276 29.2726 16.4276C29.6983 16.4276 30.0737 16.7002 30.2071 17.0991C30.3036 17.3919 30.5801 17.5911 30.8945 17.5911C31.1321 17.5911 31.3572 17.4764 31.4964 17.2829C31.6322 17.0943 31.7858 16.8629 31.7138 16.6479C31.4686 15.9149 30.7202 15.3241 30.2402 15.0951V14.3487C30.2402 13.945 29.6839 13.6167 29.2802 13.6167C28.877 13.6167 28.3202 13.945 28.3202 14.3487V15.0951C27.8402 15.3077 27.1764 15.83 26.9062 16.5001C26.5937 17.2729 26.7482 18.1277 27.2402 18.9068C27.6199 19.5092 28.3692 19.8543 29.1996 19.8543Z" />
                                    </svg>
                                </div>
                                <div class="dashboard-widget__content">
                                    <span class="dashboard-widget__text">@lang('Total Deposit')</span>
                                    <h4 class="dashboard-widget__number">${{ $user->deposits->sum('amount') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-sm-6 col-xsm-6">
                            <div class="dashboard-widget flex-align style-primary">
                                <a href="#" class="link-to-go"></a>
                                <div class="dashboard-widget__icon flex-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none">
                                        <g clip-path="url(#clip0_398_3781)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M38.833 48H9.13885C7.25484 48 5.73639 46.4534 5.73639 44.5694V3.40246C5.73639 1.51845 7.25484 0 9.13885 0H33.2935C33.4341 0 33.5747 0.056239 33.6872 0.168717L42.0949 8.57645C42.2074 8.66081 42.2636 8.80141 42.2636 8.97012V44.5694C42.2636 46.4534 40.7171 48 38.833 48ZM9.13885 1.12478C7.87347 1.12478 6.86117 2.13708 6.86117 3.40246V44.5694C6.86117 45.8348 7.87347 46.8752 9.13885 46.8752H38.833C40.0984 46.8752 41.1389 45.8348 41.1389 44.5694V9.19508L33.0686 1.12478H9.13885Z"
                                                fill="#0007CE" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M41.7015 9.53234H36.1339C34.2499 9.53234 32.7314 7.98577 32.7314 6.10176V0.56222C32.7314 0.0560692 33.35 -0.197006 33.6875 0.168547L42.039 8.52004C42.517 8.91371 42.1796 9.53234 41.7015 9.53234ZM33.8562 1.91196V6.10176C33.8562 7.36714 34.8966 8.40756 36.1339 8.40756H40.3237L33.8562 1.91196ZM38.8615 13.9752H26.4045C25.6734 13.9752 25.6734 12.8504 26.4045 12.8504H38.8615C39.5926 12.8504 39.5926 13.9752 38.8615 13.9752ZM38.8615 19.0649H26.4045C25.6734 19.0649 25.6734 17.9401 26.4045 17.9401H38.8615C39.5926 17.9401 39.5926 19.0649 38.8615 19.0649ZM38.8615 24.1826H26.4045C25.6734 24.1826 25.6734 23.0578 26.4045 23.0578H38.8615C39.5926 23.0578 39.5926 24.1826 38.8615 24.1826ZM38.8615 29.3004H9.13915C8.40804 29.3004 8.40804 28.1756 9.13915 28.1756H38.8615C39.5926 28.1756 39.5926 29.3004 38.8615 29.3004ZM38.8615 34.39H9.13915C8.40804 34.39 8.40804 33.2652 9.13915 33.2652H38.8615C39.5926 33.2652 39.5926 34.39 38.8615 34.39ZM38.8615 39.5077H9.13915C8.40804 39.5077 8.40804 38.383 9.13915 38.383H38.8615C39.5926 38.383 39.5926 39.5077 38.8615 39.5077ZM38.8615 44.6255H9.13915C8.40804 44.6255 8.40804 43.5007 9.13915 43.5007H38.8615C39.5926 43.5007 39.5926 44.6255 38.8615 44.6255ZM16.3377 17.6308C15.213 17.6308 14.6787 15.7468 14.0601 15.6624C13.4977 15.578 11.9511 16.281 11.2481 15.4937C10.517 14.6782 11.4168 13.0192 11.0513 12.513C10.742 12.0912 9.19539 11.5007 9.19539 10.4603C9.19539 9.33551 11.0513 8.80124 11.1638 8.18261C11.22 7.67646 10.6014 6.18612 11.2481 5.45501C12.0355 4.55519 13.7789 5.56749 14.285 5.17382C14.7349 4.8645 15.3254 3.31793 16.3659 3.31793C17.4906 3.31793 18.0249 5.20194 18.6435 5.2863C19.2059 5.37066 20.7525 4.63955 21.4555 5.45501C22.1866 6.27048 21.2868 7.92953 21.6242 8.40756C21.9616 8.85747 23.5082 9.44798 23.5082 10.4884C23.5082 11.6132 21.6242 12.1475 21.5399 12.7661C21.4555 13.2722 22.1022 14.7626 21.4555 15.4937C20.6681 16.3935 18.9247 15.3812 18.3905 15.7749C17.9687 16.0842 17.3782 17.6308 16.3377 17.6308ZM14.1444 14.5376C15.4379 15.1 15.0161 14.8469 16.2815 16.4497C16.4783 16.7309 17.3782 14.9313 17.8562 14.7626C19.1497 14.3127 18.1374 14.5657 20.5276 14.7626C20.9775 14.7907 19.9089 12.8504 20.8087 11.7538L22.3834 10.4884C22.3834 10.1791 20.5276 9.53234 20.4151 8.21073C20.4713 7.67646 20.7525 6.18612 20.5557 6.18612C18.1655 6.32672 19.2622 6.69227 17.8562 6.18612C17.575 6.07364 16.7314 4.8645 16.4221 4.47083C16.1971 4.21776 15.3254 6.0174 14.8193 6.18612C13.5258 6.63603 14.5381 6.38296 12.1479 6.18612C11.7261 6.158 12.7947 8.09825 11.8667 9.19491L10.3202 10.4603C10.3202 10.7415 12.1761 11.4163 12.2885 12.738C12.2323 13.2722 11.9511 14.7626 12.1479 14.7626L14.1444 14.5376Z"
                                                fill="#0007CE" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16.3374 14.4255C14.1722 14.4255 12.4007 12.654 12.4007 10.4607C12.4007 8.29545 14.1722 6.52393 16.3374 6.52393C18.5308 6.52393 20.3023 8.29545 20.3023 10.4607C20.3023 12.654 18.5308 14.4255 16.3374 14.4255ZM16.3374 7.64871C14.7909 7.64871 13.5255 8.91408 13.5255 10.4607C13.5255 12.0353 14.7909 13.3007 16.3374 13.3007C17.9121 13.3007 19.1775 12.0353 19.1775 10.4607C19.1775 8.91408 17.9121 7.64871 16.3374 7.64871ZM12.8506 23.5081C12.5413 23.5081 12.2882 23.255 12.2882 22.9457V15.241C12.2882 14.5099 13.413 14.5099 13.413 15.241V21.7647L15.0721 20.4431C15.7751 19.8526 16.8998 19.8526 17.6028 20.415L19.2619 21.7647V15.241C19.2619 14.5099 20.3867 14.5099 20.3867 15.241V22.9457C20.3867 23.3956 19.8524 23.6768 19.4868 23.3675C15.7751 20.415 16.8998 20.415 13.2162 23.3675C13.1037 23.4519 12.9912 23.5081 12.8506 23.5081Z"
                                                fill="#0007CE" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_398_3781">
                                                <rect width="48" height="48" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="dashboard-widget__content">
                                    <span class="dashboard-widget__text">@lang('Total Withdrawl')</span>
                                    <h4 class="dashboard-widget__number">${{ $user->withdrawals->sum('amount') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dashboard Card End -->
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8">
                    <div class="dashboard-table mt-5">
                        <div class="dashbaord-table-header">
                            <h6 class="card-header__title mb-0 text-dark">
                                Dashboard Table
                                <i class="las la-file-invoice-dollar text--success"></i>
                            </h6>
                            <form action="*" method="get" class="search-form active">
                                <input type="text" name="search" class="form--control" placeholder="Search here..." />
                                <button type="submit" class="search-form__btn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <table class="table table--responsive--lg">
                            <thead>
                                <tr>
                                    <th>Prize Bond Number</th>
                                    <th>Amount</th>
                                    <th>Draw Date</th>
                                    <th>Status</th>
                                    <th>Win Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Amount">$251 USD</td>
                                    <td data-label="Draw Date">November 16, 2024</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                    <td data-label="Win Amount">
                                        <div class="table-action-btn">
                                            <div class="dropdown">
                                                <span class="action-btn-icon" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </span>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <li>
                                                        <a class="dropdown-item" href="#">Action</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">Add</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Amount">$251 USD</td>
                                    <td data-label="Draw Date">November 16, 2024</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                    <td data-label="Win Amount">$500 USD</td>
                                </tr>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Amount">$251 USD</td>
                                    <td data-label="Draw Date">November 16, 2024</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                    <td data-label="Win Amount">$500 USD</td>
                                </tr>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Amount">$251 USD</td>
                                    <td data-label="Draw Date">November 16, 2024</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                    <td data-label="Win Amount">$500 USD</td>
                                </tr>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Amount">$251 USD</td>
                                    <td data-label="Draw Date">November 16, 2024</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                    <td data-label="Win Amount">$500 USD</td>
                                </tr>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Amount">$251 USD</td>
                                    <td data-label="Draw Date">November 16, 2024</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                    <td data-label="Win Amount">$500 USD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-4"></div>
            </div>

            <div class="row">
                <div class="col-xl-7">
                    <div class="dashboard-table mt-5">
                        <div class="dashbaord-table-header">
                            <h6 class="card-header__title mb-0 text-dark">
                                Latest Transaction
                                <i class="fas fa-comments-dollar text--warning"></i>
                            </h6>
                        </div>
                        <table class="table table--responsive--lg">
                            <thead>
                                <tr>
                                    <th>Prize Bond Number</th>
                                    <th>Amount</th>
                                    <th>Draw Date</th>
                                    <th>Status</th>
                                    <th>Win Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Amount">$251 USD</td>
                                    <td data-label="Draw Date">November 16, 2024</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                    <td data-label="Win Amount">$500 USD</td>
                                </tr>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Amount">$251 USD</td>
                                    <td data-label="Draw Date">November 16, 2024</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                    <td data-label="Win Amount">$500 USD</td>
                                </tr>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Amount">$251 USD</td>
                                    <td data-label="Draw Date">November 16, 2024</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                    <td data-label="Win Amount">$500 USD</td>
                                </tr>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Amount">$251 USD</td>
                                    <td data-label="Draw Date">November 16, 2024</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                    <td data-label="Win Amount">$500 USD</td>
                                </tr>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Amount">$251 USD</td>
                                    <td data-label="Draw Date">November 16, 2024</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                    <td data-label="Win Amount">$500 USD</td>
                                </tr>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Amount">$251 USD</td>
                                    <td data-label="Draw Date">November 16, 2024</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                    <td data-label="Win Amount">$500 USD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="dashboard-table mt-5">
                        <div class="dashbaord-table-header">
                            <h6 class="card-header__title mb-0 text-dark">
                                Live Draw <i class="fas fa-bullseye text--danger"></i>
                            </h6>
                        </div>
                        <table class="table table--responsive--lg">
                            <thead>
                                <tr>
                                    <th>Prize Bond Number</th>
                                    <th>Win Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Win Amount">$500 USD</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Win Amount">$500 USD</td>
                                    <td data-label="Status">
                                        <span class="badge badge--danger">
                                            <i class="far fa-check-circle"></i> Not Mature
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Win Amount">$500 USD</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Win Amount">$500 USD</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Win Amount">$500 USD</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="Price Number">0H0ad0465CdaS6543</td>
                                    <td data-label="Win Amount">$500 USD</td>
                                    <td data-label="Status">
                                        <span class="badge badge--success">
                                            <i class="far fa-check-circle"></i> Mature
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (auth()->user()->kv == Status::KYC_UNVERIFIED && auth()->user()->kyc_rejection_reason)
        <div class="modal fade" id="kycRejectionReason">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('KYC Document Rejection Reason')</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ auth()->user()->kyc_rejection_reason }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
