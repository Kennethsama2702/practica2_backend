<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo mensaje de contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .content {
            background: #f8f9fa;
            padding: 20px;
            border: 1px solid #e9ecef;
        }
        .footer {
            background: #343a40;
            color: white;
            padding: 15px;
            border-radius: 0 0 8px 8px;
            text-align: center;
            font-size: 14px;
        }
        .info-row {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #dee2e6;
        }
        .label {
            font-weight: bold;
            color: #495057;
        }
        .message-content {
            background: white;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
            border-left: 4px solid #667eea;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>💬 Nuevo Mensaje de Contacto</h1>
    </div>
    
    <div class="content">
        <div class="info-row">
            <span class="label">Nombre:</span><br>
            {{ $contact->name }}
        </div>
        
        <div class="info-row">
            <span class="label">Email:</span><br>
            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
        </div>
        
        <div class="info-row">
            <span class="label">Asunto:</span><br>
            {{ $contact->subject }}
        </div>
        
        <div class="info-row">
            <span class="label">Mensaje:</span>
            <div class="message-content">
                {{ $contact->message }}
            </div>
        </div>
        
        <div class="info-row">
            <span class="label">Fecha:</span><br>
            {{ $contact->created_at->format('d/m/Y H:i') }}
        </div>
    </div>
    
    <div class="footer">
        <p>Este mensaje fue enviado desde tu portafolio web.</p>
        <p><small>Portfolio API © {{ date('Y') }}</small></p>
    </div>
</body>
</html>