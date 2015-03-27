@if ($authenticated)

	<a class="logout_button button" href="{{ route('admin.index') }}">Admin</a>
	<a class="logout_button button" href="{{ route('auth.logout') }}">Logout</a>

	{{-- 
				$header["button_container"] .= '<a class="logout_button button" href="' . base_url() . 'dj">DJ</a>';
			}
			$header["button_container"] .= '<a class="logout_button button" href="' . base_url() . 'logout">Logout</a>';

		} else if (is_in_ip_range($_SERVER['REMOTE_ADDR'], '129.21.97.0', '129.21.97.128')) {
			$header["button_container"] .= '<a class="logout_button button" href="' . base_url() . 'dj">DJ</a>';
		}

	--}}

@endif