<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .header { text-align: center; margin-bottom: 30px; }
        .header h1 { color: #2c5282; margin: 0; }
        .header p { color: #718096; margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #cbd5e0; padding: 10px; text-align: left; }
        th { background-color: #f7fafc; color: #2d3748; font-weight: bold; }
        tr:nth-child(even) { background-color: #f8f9fa; }
        .footer { margin-top: 30px; text-align: right; color: #718096; font-size: 12px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $titulo }}</h1>
        <p>Total de estudiantes: {{ $estudiantes->count() }}</p>
    </div>

    <table>
        <thead>
            <tr style="font-size: 14px;">
                <th>Código</th>
                <th>DNI</th>
                <th>Nombre Completo</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Carrera</th>
            </tr>
        </thead>
        <tbody>
            @forelse($estudiantes as $estudiante)
            <tr style="font-size: 10px;">
          <td>{{ $estudiante->codigo ?? 'N/A' }}</td>
          <td>{{ $estudiante->dni ?? 'N/A' }}</td>
          <td>{{ $estudiante->nombres }} {{ $estudiante->pri_ape }} {{ $estudiante->seg_ape }}</td>
          <td>{{ $estudiante->email ?? 'N/A' }}</td>
          <td>{{ $estudiante->telefono ?? 'N/A' }}</td>
          <td>{{ $estudiante->carrera ?? 'N/A' }}</td>
          </tr>

            @empty
            <tr>
                <td colspan="6" style="text-align: center;">No hay estudiantes registrados</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Generado el: {{ now()->format('d/m/Y H:i:s') }}</p>
    </div>
</body>
</html>
