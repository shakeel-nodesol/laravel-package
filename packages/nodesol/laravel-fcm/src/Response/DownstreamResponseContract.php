<?php

namespace LaravelFCM\Response;

/**
 * Interface DownstreamResponseContract.
 */
interface DownstreamResponseContract
{
    /**
     * Merge two response.
     *
     * @param DownstreamResponse $response
     */
    public function merge(DownstreamResponse $response);

    /**
     * Get the number of device reached with success.
     *
     * @return int
     */
    public function numberSuccess();

    /**
     * Get the number of device which thrown an error.
     *
     * @return int
     */
    public function numberFailure();


    /**
     * get token to delete.
     *
     * remove all tokens returned by this method in your database
     *
     * @return array
     */
    public function tokensToDelete();


    /**
     * Get tokens that you should resend using exponential backoof.
     *
     * @return array
     */
    public function tokensToRetry();
}
