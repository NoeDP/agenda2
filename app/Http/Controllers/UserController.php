<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function store(Request $request)
    {
        $mensajes = [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe exceder los 255 caracteres.',
        
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.string' => 'El teléfono debe ser una cadena de texto.',
            'telefono.max' => 'El teléfono no debe exceder los 10 caracteres.',
            'telefono.unique' => 'El teléfono ya está registrado.',
        
            'codigo.required' => 'El código es obligatorio.',
            'codigo.string' => 'El código debe ser una cadena de texto.',
            'codigo.max' => 'El código no debe exceder los 8 caracteres.',
            'codigo.unique' => 'El código ya está registrado.',
        
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.lowercase' => 'El correo electrónico debe estar en minúsculas.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.max' => 'El correo electrónico no debe exceder los 255 caracteres.',
            'email.unique' => 'El correo electrónico ya está registrado.',
        
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:10', 'unique:users,telefono'],
            'codigo' => ['required', 'string', 'max:8', 'unique:users,codigo'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],$mensajes);

        if ($validator->fails()) {
            /* return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422); */ // Código 422 para errores de validación

            return redirect()->route('dashboard')->with('error', $validator->errors());
        }
        try{

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'codigo' => $request->codigo,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('dashboard')->with('success', 'Se ha crear el usuario');

        } catch (\Exception $e) {
            /* return response()->json([
                'success' => false,
                'errors' => $e
            ], 422);  */
            return redirect()->route('dashboard')->with('error', 'Error al crear el usuario');
        } 
    }

    public function update(Request $request)
    {
        $mensajes = [
            'editNombre.required' => 'El nombre es obligatorio.',
            'editNombre.string' => 'El nombre debe ser una cadena de texto.',
            'editNombre.max' => 'El nombre no debe exceder los 255 caracteres.',
        
            'editTelefono.required' => 'El teléfono es obligatorio.',
            'editTelefono.string' => 'El teléfono debe ser una cadena de texto.',
            'editTelefono.max' => 'El teléfono no debe exceder los 10 caracteres.',
            'editTelefono.unique' => 'El teléfono ya está registrado.',
        
            'editCodigo.required' => 'El código es obligatorio.',
            'editCodigo.string' => 'El código debe ser una cadena de texto.',
            'editCodigo.max' => 'El código no debe exceder los 8 caracteres.',
            'editCodigo.unique' => 'El código ya está registrado.',
        
            'editEmail.required' => 'El correo electrónico es obligatorio.',
            'editEmail.string' => 'El correo electrónico debe ser una cadena de texto.',
            'editEmail.lowercase' => 'El correo electrónico debe estar en minúsculas.',
            'editEmail.email' => 'El formato del correo electrónico no es válido.',
            'editEmail.max' => 'El correo electrónico no debe exceder los 255 caracteres.',
            'editEmail.unique' => 'El correo electrónico ya está registrado.',
        
            'editPassword.required' => 'La contraseña es obligatoria.',
            'editPassword.confirmed' => 'Las contraseñas no coinciden.',
        ];

        $validator = Validator::make($request->all(), [
            'editUsuarioId' => 'required|exists:users,id',
            'editNombre' => ['required', 'string', 'max:255'],
            'editTelefono' => ['required', 'string', 'max:10', 'unique:users,telefono'],
            'editCodigo' => ['required', 'string', 'max:8', 'unique:users,codigo'],
            'editEmail' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($request->id)],
            'editPassword' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ],$mensajes);

        if ($validator->fails()) {
            /* return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422); */ // Código 422 para errores de validación

            return redirect()->route('dashboard')->with('error', $validator->errors());
        }

        try {
            $user = User::findOrFail($request->editUsuarioId);

            $data = [
                'name' => $request->editNombre,
                'email' => $request->editEmail,
                'telefono' => $request->editTelefono,
                'codigo' => $request->editCodigo,
            ];

            if ($request->filled('editPassword')) {
                $data['password'] = Hash::make($request->editPassword);
            }

            $user->update($data);

            return redirect()->route('dashboard')->with('success', 'Se ha actualizado el usuario');

        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Error al actualizar el usuario');
        } 
    }

    public function destroy(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            $user->delete();

            return redirect()->route('dashboard')->with('success', 'Usuario eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Error al eliminar el usuario');
        }
    }


}
