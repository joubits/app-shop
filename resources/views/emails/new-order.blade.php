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

</body>
</html>