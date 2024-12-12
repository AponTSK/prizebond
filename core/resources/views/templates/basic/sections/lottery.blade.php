@php
    $lotteryContent = getContent('lottery.content', true);
    $lotteryElements = getContent('lottery.element');
@endphp

<section class="lottery-result pt-80 pb-160">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-heading style-three">
                    <h3 class="section-heading__title">{{ __(@$lotteryContent->data_values->heading) }}</h3>
                    <p class="section-heading__desc">
                        {{ __(@$lotteryContent->data_values->subheading) }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="lottery-result-table">
                    <ul class="nav nav-pills custom--tab" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                                {{ __(@$lotteryContent->data_values->button_one_name) }}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                                {{ __(@$lotteryContent->data_values->button_two_name) }}
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <table class="table table--responsive--lg">
                                <thead>
                                    <tr>
                                        <th>@lang('User Name')</th>
                                        <th>@lang('Amount')</th>
                                        <th>@lang('Quantity of Prize Bond')</th>
                                        <th>@lang('Status')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lotteryElements as $lotteryElement)
                                        <tr>
                                            <td>
                                                <div class="customer flex-align">
                                                    <div class="customer__thumb">
                                                        <img src="{{ frontendImage('lottery', @$lotteryElement->data_values->investor_image) }}" class="fit-image" alt="" />
                                                    </div>
                                                    <div class="customer__content">
                                                        <h6 class="customer__name">{{ @$lotteryElement->data_values->investor_td_one }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ @$lotteryElement->data_values->investor_td_two }}</td>
                                            <td>{{ @$lotteryElement->data_values->investor_td_three }}</td>
                                            <td>
                                                <span class="badge badge--success">
                                                    <i class="far fa-check-circle"></i> {{ __(@$lotteryElement->data_values->investor_td_four) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <table class="table table--responsive--lg">
                                <thead>
                                    <tr>
                                        <th>@lang('Invoice No')</th>
                                        <th>@lang('Customer')</th>
                                        <th>@lang('Date')</th>
                                        <th>@lang('Amount')</th>
                                        <th>@lang('Status')</th>
                                        <th>@lang('Action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lotteryElements as $item)
                                        <tr>
                                            <td data-label="Invoice No">{{ @$item->data_values->mature_td_one }}</td>
                                            <td data-label="Customer">
                                                <div class="customer flex-align">
                                                    <div class="customer__thumb">
                                                        <img src="{{ frontendImage('lottery', @$item->data_values->mature_image) }}" class="fit-image" alt="" />
                                                    </div>
                                                    <div class="customer__content">
                                                        <h6 class="customer__name">{{ @$item->data_values->mature_td_two }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="Date">{{ @$item->data_values->mature_td_three }}</td>
                                            <td data-label="Total Click">{{ @$item->data_values->mature_td_four }}</td>
                                            <td data-label="Status">
                                                <span class="badge badge--success"> {{ __(@$item->data_values->mature_td_five) }} </span>
                                            </td>
                                            <td data-label="Action">
                                                <div class="action-buttons">
                                                    <button type="button" class="action-btn edit-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="@lang('Edit')">
                                                        @php
                                                            echo @$lotteryContent->data_values->mature_td_six_icon_one;
                                                        @endphp
                                                    </button>
                                                    <button type="button" class="action-btn delete-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="@lang('Delete')">
                                                        @php
                                                            echo @$lotteryContent->data_values->mature_td_six_icon_two;
                                                        @endphp
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
