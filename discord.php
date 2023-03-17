<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Informationen aus dem Kontaktformular erhalten
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $message = $_POST["message"];

  // Discord Webhook-URL des Zielchannels
  $webhookurl = "https://discord.com/api/webhooks/1086236510799548506/H4zUXTUOBch12ygE9F0h6hlkT0OIK1W7OH7iMOdaGd2ZZA6Uc4MJtuyMFi6NQPa6LGGf";

  // JSON-Payload vorbereiten
  $payload = json_encode([
    "content" => "Neue Bestellung an @Purify:\n\nName: $name\nE-Mail: $email\n Telefon: $phone\nNachricht: $message"
  ]);

  // cURL verwenden, um den Webhook zu senden
  $ch = curl_init($webhookurl);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
  ]);
  $result = curl_exec($ch);
  curl_close($ch);

  // Erfolgsmeldung ausgeben oder Fehlermeldung, falls etwas schiefgegangen ist
  if ($result === false) {
    echo "Beim erfassen der Bestellung ist ein Fehler aufgetreten.";
  } else {
    echo "Die Bestellung wurde erfolgreich gesendet.";
  }
}
?>
