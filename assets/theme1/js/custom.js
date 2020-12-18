
	function validasi_nama(nama)
	{
		if(nama.length < 3)
		{
			alert("Nama Harus Lebih dari 5 Karakter !");
			return false;
			
		}
		
		if(nama.length > 20)
		{
			alert("Nama Harus Kurang dari 20 Karakter !");
			return false;
			
		}
		
		return true;
	}
	
	function validasi_judul(judul)
	{
		if(judul.length < 3)
		{
			alert("Judul Harus Lebih dari 3 Karakter !");
			return false;
			
		}
		
		if(judul.length > 30)
		{
			alert("Nama Harus Kurang dari 30 Karakter !");
			return false;
			
		}
		
		return true;
	}
	
	function validasi_message(message)
	{
		if(message.length < 3)
		{
			alert("Pesan Harus Lebih dari 3 Karakter !");
			return false;
			
		}
		
		return true;
	}
	
	function validasi_alamat(alamat)
	{
		if(alamat.length < 3)
		{
			alert("Alamat Harus Lebih dari 5 Karakter !");
			return false;
			
		}
		
		if(alamat.length > 20)
		{
			alert("Alamat Harus Kurang dari 30 Karakter !");
			return false;
			
		}
		
		return true;
	}
	
	function validasi_email(email)
	{
		if(email.length < 5)
		{
			alert("Email Harus Lebih dari 5 Karakter !");
			return false;
			
		}
		
		if(email.length > 30)
		{
			alert("Email Harus Kurang dari 30 Karakter !");
			return false;
			
		}
		
		var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
		if(!pattern.test(email))
		{
			alert("Format Email Salah !");
			return false;
		}
		
		return true;
	}
	
	function validasi_phone(phone)
	{
		if(isNaN(phone))
		{
			alert("Telepon Harus Berupa Angka !");
			return false;
		}
		
		if(phone.length < 5)
		{
			alert("Telepon Harus Lebih dari 5 Karakter !");
			return false;
		}
		
		if(phone.length > 20)
		{
			alert("Telepon Harus Kurang dari 20 Karakter !");
			return false;
		}
		
		return true;
	}
	
	function validasi_bank_number(bank_number)
	{
		if(isNaN(bank_number))
		{
			alert("Nomor Rekening Harus Berupa Angka !");
			return false;
		}
		
		if(bank_number.length < 5)
		{
			alert("Nomor Rekening Harus Lebih dari 5 Karakter !");
			return false;
		}
		
		if(bank_number.length > 20)
		{
			alert("Nomor Rekening Harus Kurang dari 20 Karakter !");
			return false;
		}
		
		return true;
	}
	
	function validasi_password(password)
	{
		if(password.length < 5)
		{
			alert("Password Harus Lebih dari 5 Karakter !");
			return false;
		}
		
		return true;
	}
	
	
	function validasi_postcode(postcode)
	{
		if(isNaN(postcode))
		{
			alert("Kode Pos Harus Berupa Angka !");
			return false;
		}
		
		if(postcode.length < 3)
		{
			alert("Kode Pos Harus Lebih dari 3 Karakter !");
			return false;
		}
		
		if(postcode.length > 10)
		{
			alert("Kode Pos Harus Kurang dari 10 Karakter !");
			return false;
		}
		
		return true;
	}
	
	function validasi_ongkir(ongkir)
	{
		if(isNaN(ongkir))
		{
			alert("Ongkir Harus Berupa Angka !");
			return false;
		}
		
		return true;
	}
	
	