@extends("welcome")

@section("content")
<div class="container full-container" id="server-view">
	<div>
		<div class="result-box">
			<div class="result-box-inner" style="position: relative;">
				<div class="result-headline">
					<div>
						<div class="result-container">
							<div class="desc">
								<strong class="text-highlight">{{ trans("sites.ingredient") }}:</strong>
								{{ $category->name }}
								<br>
								<strong class="text-highlight">{{ count($category->ingredients) }}</strong>
								{{ trans("sites.receipt") }}
							</div>
						</div>
					</div>
				</div>
				<div class="cooky-filter">

				</div>

				<div class="result-list recipe-list row10">
					@foreach($category->ingredients as $item)
						@foreach($item->receiptIngredients as $item2)
						<div class="result-recipe-wrapper">
							<div class="result-recipe-item">
								<div class="item-inner">
									<div class="item-photo">
										<a rel="alternate" href="{{ route('detail',$item2->receipt->id) }}" target="_blank">
											<img class="photo img-responsive"
											src="{{ asset('upload/images/'.$item2->receipt->image) }}"
											alt="{{ $item2->receipt->name }}"/>
										</a>
									</div>
									<div class="item-info">
										<div class="item-header">
											<div class="title">
												<h3>
													<a rel="alternate" href="{{ route('detail',$item2->id) }}"
														title="{{ $item2->receipt->name }}"
														target="_blank">{{ $item2->receipt->name }}</a>
													</h3>
												</div>
												<div class="item-stats">
													<div class="stats">
														<ul class="list-inline nomargin">
															<li class="stats-item">
																<span class="fa fa-clock-o stats-ico"></span>
																<span class="stats-count">{{ $item2->receipt->time }}</span><span
																class="stats-text">{{ trans("sites.hour") }}</span>
															</li>
														</ul>
													</div>
												</div>
												<div class="ingredients">
													@foreach($item2->receipt->receiptIngredients as $value)
													<span> {{ $value->ingredient->name }}</span>
													@endforeach
												</div>
											</div>
											<div class="item-footer">
												<div class="recipe-by">
													<a href="{{ route('detail', $item2->receipt->user->id) }}" target="_blank">
														<img class="circle"
														src="{{ asset('upload/images/'.$item2->receipt->user->avatar) }}"/>
														{{ $item2->receipt->user->name }}
													</a>
												</div>
												<div class="recipe-acts">
													<div class="btn-group">
														<a href="javascript:void(0)" class="btn btn-danger">
															<span class="fa fa-star text-orange"></span>
															<span>{{ $item2->receipt->rate_point }} </span>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						@endforeach
					</div>
				</div>=
			</div>
		</div>
	</div>
@endsection
