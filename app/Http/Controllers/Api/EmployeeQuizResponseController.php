<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeQuizResponse;
/**
 * @OA\Get(
 *     path="/api/v1/responses",
 *     summary="List all response",
 *     tags={"Quiz response"},
 *     description="Get all response",
 *     @OA\Response(response="default", description="Empty")
 * )
 * @OA\Get(
 *   path="/api/v1/responses/{response}",
 *   tags={"Quiz response"},
 *   summary="Get response by id",
 *   operationId="get_response_by_id",
 *   @OA\Parameter(
 *      name="response",
 *      in="path",
 *      required=true,
 *      @OA\Schema(
 *           type="integer"
 *      )
 *   ),
 *  @OA\Response(response="default", description="Nothing")
 * )
 * @OA\Get(
 *   path="/api/v1/responses/{quiz_question_id}/quizzes",
 *   tags={"Quiz response"},
 *   summary="Get response by id",
 *   operationId="get_response_by_quiz_question_id",
 *   @OA\Parameter(
 *      name="quiz_question_id",
 *      in="path",
 *      required=true,
 *      @OA\Schema(
 *           type="integer"
 *      )
 *   ),
 *  @OA\Response(response="default", description="Nothing")
 * )
 * @OA\Get(
 *   path="/api/v1/responses/{employee_id}/employees",
 *   tags={"Quiz response"},
 *   summary="Get response by id",
 *   operationId="get_response_by_employee_id",
 *   @OA\Parameter(
 *      name="employee_id",
 *      in="path",
 *      required=true,
 *      @OA\Schema(
 *           type="integer"
 *      )
 *   ),
 *  @OA\Response(response="default", description="Nothing")
 * )
 * @OA\Post(
 *     path="/api/v1/responses",
 *     summary="Store response",
 *     tags={"Quiz response"},
 *     description="Store response",
 *      @OA\RequestBody(
 *          required=true,
 *              @OA\JsonContent(
 *                  @OA\Property(property="employee_id", type="integer"),
 *                  @OA\Property(property="quiz_question_id", type="integer"),
 *                  @OA\Property(property="correct", type="boolean"),
 *           ),
 *       ),
 *     @OA\Response(response="default", description="Nothing")
 * )
 * @OA\Put(
 *     path="/api/v1/responses/{response}",
 *     summary="Update response",
 *     tags={"Quiz response"},
 *     description="Update response",
 *     @OA\Parameter(
 *          name="response",
 *          in="path",
 *          required=true,
 *          @OA\Schema(
 *           type="integer"
 *          )
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *              @OA\JsonContent(
 *                  @OA\Property(property="employee_id", type="integer"),
 *                  @OA\Property(property="quiz_question_id", type="integer"),
 *                  @OA\Property(property="correct", type="boolean"),
 *           ),
 *       ),
 *     @OA\Response(response="default", description="Nothing")
 * )
 *
 * @OA\Delete(
 *   path="/api/v1/responses/{response}",
 *   tags={"Quiz response"},
 *   summary="Delete response",
 *   operationId="delete_response",
 *   @OA\Parameter(
 *      name="response",
 *      in="path",
 *      required=true,
 *      @OA\Schema(
 *           type="integer"
 *      )
 *   ),
 *  @OA\Response(response="default", description="Nothing")
 * )
 * */

class EmployeeQuizResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(EmployeeQuizResponse::with(["employee", "quiz_question"])->get(), 200);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EmployeeQuizResponse::create($request->all());
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
        return response()->json(EmployeeQuizResponse::with(["employee", "quiz_question"])->find($id));;
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
        EmployeeQuizResponse::find($id)->update($request->all());
        return response()->json("Success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmployeeQuizResponse::find($id)->delete();
        return response()->json("Success");
    }

    /**
     * Get all the answers to the current question
     *
     * @param  int  $quiz_question_id
     * @return \Illuminate\Http\Response
     */
    public function quizzes($quiz_question_id)
    {
        return response()->json(EmployeeQuizResponse::with(["employee", "quiz_question"])->where('quiz_question_id', $quiz_question_id)->get(), 200);
    }
    /**
     * Get all responses from the current user.
     *
     * @param  int  $employee_id
     * @return \Illuminate\Http\Response
     */
    public function employees($employee_id)
    {
        return response()->json(EmployeeQuizResponse::with(["employee", "quiz_question"])->where('employee_id', $employee_id)->get(), 200);
    }
}
