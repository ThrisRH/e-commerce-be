public function render($request, Throwable $e)
{
    if ($e instanceof \Exception) {
        return response()->json([
            'status' => 'error ruiiii',
            'message' => $e->getMessage(),
        ], 400);
    }

    return parent::render($request, $e);
}