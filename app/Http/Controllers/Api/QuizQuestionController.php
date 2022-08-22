<?php

namespace App\Http\Controllers\Api;

use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/v1/quizzes",
 *     summary="List all quiz",
 *     tags={"Quiz question"},
 *     description="Get all quiz",
 *     @OA\Response(response="default", description="Empty")
 * )
 * @OA\Get(
 *   path="/api/v1/quizzes/{quiz}",
 *   tags={"Quiz question"},
 *   summary="Get quiz by id",
 *   operationId="get_quiz_by_id",
 *   @OA\Parameter(
 *      name="quiz",
 *      in="path",
 *      required=true,
 *      @OA\Schema(
 *           type="integer"
 *      )
 *   ),
 *  @OA\Response(response="default", description="Nothing")
 * )
 * @OA\Get(
 *   path="/api/v1/quizzes/{category_id}/category",
 *   tags={"Quiz question"},
 *   summary="Get quiz by id",
 *   operationId="get_quiz_by_category_id",
 *   @OA\Parameter(
 *      name="category_id",
 *      in="path",
 *      required=true,
 *      @OA\Schema(
 *           type="integer"
 *      )
 *   ),
 *  @OA\Response(response="default", description="Nothing")
 * )
 *  @OA\Post(
 *     path="/api/v1/quizzes",
 *     summary="Store quiz",
 *     tags={"Quiz question"},
 *     description="Store quiz",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="multipart/form-data",
 *              @OA\Schema(
 *                  @OA\Property(property="category_id", type="integer"),
 *                  @OA\Property(property="description", type="string"),
 *                  @OA\Property(property="image", type="file"),
 *                  @OA\Property(property="fr", type="file"),
 *                  @OA\Property(property="ar", type="file"),
 *                  @OA\Property(property="ng", type="file"),
 *                  @OA\Property(property="correct", type="boolean"),
 *               ),
 *           ),
 *       ),
 *     @OA\Response(response="default", description="Nothing")
 * )
 * @OA\Put(
 *     path="/api/v1/quizzes/{quiz}",
 *     summary="Update quiz",
 *     tags={"Quiz question"},
 *     description="Update quiz",
 *     @OA\Parameter(
 *          name="quiz",
 *          in="path",
 *          required=true,
 *          @OA\Schema(
 *           type="integer"
 *          )
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\MediaType(
 *              mediaType="multipart/form-data",
 *              @OA\Schema(
 *                  @OA\Property(property="category_id", type="integer"),
 *                  @OA\Property(property="description", type="string"),
 *                  @OA\Property(property="image", type="file"),
 *                  @OA\Property(property="fr", type="file"),
 *                  @OA\Property(property="ar", type="file"),
 *                  @OA\Property(property="ng", type="file"),
 *                  @OA\Property(property="correct", type="boolean"),
 *               ),
 *           ),
 *       ),
 *     @OA\Response(response="default", description="Nothing")
 * )
 *
 * @OA\Delete(
 *   path="/api/v1/quizzes/{quiz}",
 *   tags={"Quiz question"},
 *   summary="Delete quiz",
 *   operationId="delete_quiz",
 *   @OA\Parameter(
 *      name="quiz",
 *      in="path",
 *      required=true,
 *      @OA\Schema(
 *           type="integer"
 *      )
 *   ),
 *  @OA\Response(response="default", description="Nothing")
 * )
 * */

class QuizQuestionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(QuizQuestion::with("category")->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    QuizQuestion::create([
            'category_id'     => $request->category_id,
            'description'     => $request->description,
            'image'           => uploadFile($request, 'image', 'qz_question_image'),
            'fr'              => uploadFile($request, 'fr', 'qz_question_fr'),
            'ar'              => uploadFile($request, 'ar', 'qz_question_ar'),
            'ng'              => uploadFile($request, 'ng', 'qz_question_ng'),
            'correct'         => $request->correct == 'true'?true:false
        ]);

        return response()->json("Success", 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(QuizQuestion::find($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quizQuestion = QuizQuestion::find($id);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif']);
            if (file_exists(public_path($quizQuestion->image)) and !empty($quizQuestion->image)) {
                unlink(public_path($quizQuestion->image));
            }
            $quizQuestion->image = uploadFile($request, 'image', 'qz_question_image');
        }
        if ($request->hasFile('fr')) {
            $request->validate(['fr' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav']);
            if (file_exists(public_path($quizQuestion->fr)) and !empty($quizQuestion->fr)) {
                unlink(public_path($quizQuestion->fr));
            }
            $quizQuestion->fr = uploadFile($request, 'fr', 'qz_question_fr');
        }
        if ($request->hasFile('ar')) {
            $request->validate(['ar' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav']);
            if (file_exists(public_path($quizQuestion->ar)) and !empty($quizQuestion->ar)) {
                unlink(public_path($quizQuestion->ar));
            }
            $quizQuestion->ar = uploadFile($request, 'ar', 'qz_question_ar');
        }
        if ($request->hasFile('ng')) {
            $request->validate(['ng' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav']);
            if (file_exists(public_path($quizQuestion->ng)) and !empty($quizQuestion->ng)) {
                unlink(public_path($quizQuestion->ng));
            }
            $quizQuestion->ng = uploadFile($request, 'ng', 'qz_question_ng');
        }

        $request->validate(
            [
                'category_id'    => 'required',
                'description'    => 'required',
                'correct'        => 'required'
            ]
        );

        $quizQuestion->category_id = $request->category_id;
        $quizQuestion->description = $request->description;
        $quizQuestion->correct     = $request->correct == "true" ? true :false;

        $quizQuestion->update(); 

        return response()->json("Success", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        QuizQuestion::find($id)->delete();
        return response()->json("Success", 200);
    }
    /**
     * Show question by rule's category.
     *
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function category($category_id){
        return response()->json(QuizQuestion::where('category_id', $category_id)->get(), 200);
    }
}
