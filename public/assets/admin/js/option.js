function populate(s1, s2) {
    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);
    s2.innerHTML = "";
    if (s1.value == "pengurus-harian") {
        var optionArray = ["|", "Ketua Umum|Ketua Umum", "Wakil Ketua I|Wakil Ketua I", "Wakil Ketua II|Wakil Ketua II", "Sekretaris Umum|Sekretaris Umum", "Wakil Sekretaris I|Wakil Sekretaris I", "Wakil Sekretaris II|Wakil Sekretaris II", "Bendahara Umum|Bendahara Umum", "Wakil Bendahara|Wakil Bendahara"];
    } else {
        var optionArray = ["|","Koordinator|Koordinator","Anggota|Anggota"];
    }
	for(var option in optionArray){
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
}

// PENGURUS HARIAN
// Ketua Umum		: Muh. Taufiq Ibrahim
// Wakil Ketua I		: Erlangga Hadi Nugraha
// Wakil Ketua II		: Munawarah Ainul Fatiha
// Sekretaris Umum		: Nurul Atiqah
// Wakil Sekretaris I		: Ekha Irmawati
// Wakil Sekretaris II		: Syamzul Darmawan
// Bendahara Umum		: Siti Zakia Amelia
// Wakil Bendahara		: Fitriani
