
![Logo](https://i.imgur.com/KM1UKbd.png)

 **BMK PHP Version** - This is the PHP side of the project [BestMovieKolektion](https://github.com/nejcpirecnik/BestMovieKolektion).  The PHP side takes care of tickets, confirmation email and it creates a PDF virtual ticket.

It works hand in hand with the Ruby on Rails version. Both projects share the same PostgreSQL Database provided by Heroku that is hosted on AWS.

 **Best Movie Kolektion PHP** sits on top of many useful libraries, such as [FPDF](http://www.fpdf.org/"), [PHP Mailer](https://github.com/PHPMailer/PHPMailer) and more! I will explain what each one does down below.

Main aspects of the PHP side.

  - Full ticket reservation with seat selection built on vanilla PHP.
  - Confirmation emails using [PHP Mailer](https://github.com/PHPMailer/PHPMailer).
  - Creates a virtual PDF ticket using [FPDF](http://www.fpdf.org/").
  - CSV Export.
  - PostgreSQL Database

You can also:
  - Modify the CSV exporter.
  - Anything you really want.

## Installation
The installation is really straing forward. It's just a plain PHP project and it does not relly on any dependency.
- Download and install [XAMPP](https://www.apachefriends.org/index.html) if you're on Windows and plan to do work on 127.0.0.1.
- Edit ```postgresqlDBConnect.php``` with your DB Credentials.
- That's mostly it!

It would probably be a good idea you take a look at all the files and change everything accordingly.

## Main classes and libraries used

### [PDO](https://www.php.net/manual/en/intro.pdo.php)
We've used PDO to manipulate with the database. PDO is an acronym for PHP Data Objects. PDO is a lean, consistent way to access databases. This means developers can write portable code much easier. PDO is not an abstraction layer like PearDB. PDO is a more like a data access layer which uses a unified API (Application Programming Interface).

### [FPDF](http://www.fpdf.org/)
FPDF is a PHP class which allows to generate PDF files with pure PHP, that is to say without using the PDFlib library. F from FPDF stands for Free: you may use it for any kind of usage and modify it to suit your needs. FPDF requires no extension (except Zlib to enable compression and GD for GIF support). The latest version requires at least PHP 5.1 and is compatible with PHP 7 and PHP 8.

### [PHP Mailer](https://github.com/PHPMailer/PHPMailer)
Many PHP developers need to send email from their code. The only PHP function that supports this directly is mail(). However, it does not provide any assistance for making use of popular features such as encryption, authentication, HTML messages, and attachments.

Formatting email correctly is surprisingly difficult. There are myriad overlapping (and conflicting) standards, requiring tight adherence to horribly complicated formatting and encoding rules – the vast majority of code that you'll find online that uses the mail() function directly is just plain wrong, if not unsafe!

The PHP mail() function usually sends via a local mail server, typically fronted by a sendmail binary on Linux, BSD, and macOS platforms, however, Windows usually doesn't include a local mail server; PHPMailer's integrated SMTP client allows email sending on all platforms without needing a local mail server. Be aware though, that the mail() function should be avoided when possible; it's both faster and safer to use SMTP to localhost.

Please don't be tempted to do it yourself – if you don't use PHPMailer, there are many other excellent libraries that you should look at before rolling your own. Try SwiftMailer , Laminas/Mail, ZetaComponents etc.

### [AWS](https://aws.amazon.com/what-is-aws/)
Amazon Web Services (AWS) is the world’s most comprehensive and broadly adopted cloud platform, offering over 200 fully featured services from data centers globally. Millions of customers—including the fastest-growing startups, largest enterprises, and leading government agencies—are using AWS to lower costs, become more agile, and innovate faster.

## Final thoughts
This was a pain.

## Credits
##### [Nejc Pirečnik](https://github.com/nejcpirecnik) PHP side
##### [Žan Luka Hojnik](https://github.com/Hojnik15) Ruby on Rails side
