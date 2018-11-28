<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Pedido</title>
</head>
<body>
	<p>Se ha realizado un nuevo pedido!</p>
	<p>Estos son los datos del cliente que realizó el pedido.</p>

	<ul>
		<li>
			<strong>Nombre:</strong>
			{{  $user->name }}
		</li>

		<li>
			<strong>Email:</strong>
			{{ $user->email }}
		</li>

		<li>
			<strong>Fecha de Pedido:</strong>
			{{ $cart->order_date }}
		</li>
	</ul>

	<p>
		<a href="{{ url('/admin/orders/'.$cart->id) }}">Haga Clic Aquí</a>
		para ver mas información sobre este pedido.
	</p>
	<hr>
	<p>Detalles del Pedido</p>	

	<ul>
		@foreach($cart->details as $detail)
		<li>
			{{ $detail->product->name }} x{{ $detail->quantity }}
			($ {{ $detail->quantity * $detail->product->price }}  )
		</li>
		@endforeach
	</ul>
	<p>
		<strong>El total a pagar es:</strong> {{ $cart->total }}
	</p>
	<hr>

</body>
</html>