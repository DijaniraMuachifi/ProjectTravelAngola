<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Aqui você pode:
        // 1. Salvar no banco de dados
        // 2. Enviar email
        // 3. Processar como necessário

        // Exemplo de envio de email (requer configuração de mail no .env)
        Mail::to('seu-email@exemplo.com')->send(new ContactFormSubmitted($validated));

        return back()->with('success', 'Thank you for your message! We will contact you soon.');
    }
}
