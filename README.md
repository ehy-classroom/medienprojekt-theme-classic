


# Medienprojekt Theme Classic

Dieses WordPress PHP Theme wurde im Rahmen des Lehrmoduls Medienprojekt (W6) entwickelt, um das Code-basierte Arbeiten mit WordPress zu üben und zu vertiefen. Es dient als Ausgangspunkt für die Entwicklung individueller WordPress-Themes und fördert das Verständnis für die Struktur und Funktionsweise von WordPress.

---

## Aktueller Stand

- Professionelles Color System mit systematischen Graustufen und semantischen Color-Tokens
- Inter-Font über lokale Font-Dateien eingebunden
- Modulare CSS-Struktur: Reset, Layout, Navigation, Typography, Color System, Components, Responsive Design
- Responsive Design mit durchdachten Breakpoints (580px, 60rem, 75rem)
- WordPress Loop in `index.php` mit Container-Struktur
- Vier vorbereitete Navigationsmenüs mit automatischer Container-Struktur
- Minimale `theme.json` für Block Editor Unterstützung
- Custom Template `blank.php` mit minimalem WP-Loop


---

## Entwicklungsverlauf (Version 1.0.0 – 1.0.6)

Die Entwicklung erfolgte ausschließlich auf dem Branch `main`.

### Version 1.0.0 (28.08.2025)
- Initiales Theme-Setup: Die Grundstruktur des Themes wurde angelegt.
- Die Dateien `style.css`, `index.php` und `functions.php` wurden erstellt.
- In der `functions.php` wurde eine Funktion ergänzt, um das zentrale Stylesheet (`style.css`) korrekt einzubinden.

### Version 1.0.1 (28.08.2025)
- Erste PHP-Elemente wurden in die `index.php` eingefügt, um dynamische Inhalte von WordPress anzuzeigen.

### Version 1.0.2 (01.09.2025)
- Die `index.php` wurde weiter verbessert:
	- Die Funktion `the_content()` wurde integriert, um den eigentlichen Seiteninhalt auszugeben.
	- Die HTML-Struktur wurde auf semantisches HTML5 umgestellt (Header, Main, Footer etc.).
- Erste Farb- und Typografie-Styles wurden in der `style.css` ergänzt.

### Version 1.0.3 (01.09.2025)
- In der `functions.php` wurden vier Navigationsmenüs registriert: Hauptnavigation, Sekundäre Navigation, Footer Navigation und Mobilmenü.
- In der `index.php` wurde die Menüposition für das Hauptmenü eingebunden und das WordPress-Menüsystem (`wp_nav_menu`) genutzt.
- Die CSS-Styles wurden weiter verbessert.

### Version 1.0.4 (03.09.2025)
- Das Theme wurde in die Standard-Template-Struktur aufgeteilt: `header.php`, `index.php`, `footer.php`.
- `header.php` enthält nur bis einschließlich `<body>` (jetzt mit `body_class()`).
- `footer.php` enthält nur `wp_footer()` und die schließenden Tags.
- `index.php` enthält jetzt `<header>`, `<nav>`, `<main>`, `<footer>`.
- Custom Template `blank.php` mit minimalem WP-Loop hinzugefügt.
- Theme-Setup-Funktion in `functions.php` ergänzt.
- Title-Tag-Konflikt behoben: Manueller `<title>`-Tag entfernt, da WordPress diesen über `wp_head()` generiert.

### Version 1.0.5 (03.09.2025)
- Inter-Font über `fonts/inter/` Ordner hinzugefügt und in `functions.php` eingebunden.
- Minimale `theme.json` für Block Editor Unterstützung angelegt.
- CSS-Struktur komplett überarbeitet: Reset, Layout, Navigation, Typography, Color System, Components, Responsive Design.
- Color System mit systematischen Graustufen und semantischen Color-Tokens implementiert.
- Media Queries für Responsive Design angelegt (580px, 60rem, 75rem).
- `index.php` mit WordPress Loop und Container-Struktur erweitert.
- Titel in Header von Post-Titel zu Website-Name geändert.
- Navigation mit automatischem Container-div erweitert.

### Version 1.0.6 (03.09.2025)
- Beitragsbilder mit `has_post_thumbnail()` Abfrage und semantischem `<figure>`-Element implementiert.
- Kontextabhängige Bildgrößen: `thumbnail` für Listen, `large` für Einzelansichten.
- Titel und Beitragsbilder sind zu Permalinks verlinkt.
- CTA-Button "Mehr" für Listenansichten hinzugefügt.
- WordPress Loop mit ausführlichen HTML-Kommentaren für Einsteiger dokumentiert.
- Intelligente kontextabhängige Inhaltsdarstellung: `the_excerpt()` vs `the_content()`.
- Template-Struktur optimiert: Ein Container für alle Articles statt einzelne Container.
- CSS Grid für Blog-Seite implementiert (`body.blog .container`).
- Navigation mit Hover- und Active-States in Akzentfarbe.
- Konditionaler Header: Homepage zeigt Site-Info, alle anderen Seiten zeigen Post-Titel.
- Blog-Seite erhält "Blog" als Seitentitel im Header.
- Post-Titel im Loop erscheinen nur noch auf Blog-Listenseite, nicht bei Einzelansichten.

### Version 1.0.7 (03.09.2025)
- Theme-Beschreibung im CSS-Header hinzugefügt für professionelle Dokumentation und bessere Identifikation.
- Dynamische Footer-Funktionalität implementiert: Theme-Name und Versionsnummer werden automatisch aus WordPress Theme-Metadaten geladen (`wp_get_theme()`).
- Bildungskontext explizit dokumentiert - Theme ist speziell für Medienprojekt (W6) Kurs entwickelt und optimiert für Lernzwecke in Mediendesign-Studiengängen.



